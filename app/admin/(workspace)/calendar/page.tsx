import type { Metadata } from "next";
import Link from "next/link";
import { publishDueContent } from "@/app/admin/calendar/actions";
import { CalendarIcon, PlusIcon } from "@/components/admin/admin-icons";
import { requireAdmin } from "@/lib/auth";

export const metadata: Metadata = { title: "Editorial calendar" };

function monthValue(value: string | undefined) { return /^\d{4}-(0[1-9]|1[0-2])$/.test(value ?? "") ? value! : new Date().toISOString().slice(0, 7); }
function shiftMonth(value: string, delta: number) { const [year, month] = value.split("-").map(Number); const date = new Date(Date.UTC(year, month - 1 + delta, 1)); return `${date.getUTCFullYear()}-${String(date.getUTCMonth() + 1).padStart(2, "0")}`; }

export default async function EditorialCalendarPage({ searchParams }: { searchParams: Promise<{ month?: string; published?: string; error?: string }> }) {
  const query = await searchParams; const selectedMonth = monthValue(query.month); const [year, month] = selectedMonth.split("-").map(Number);
  const { supabase } = await requireAdmin();
  const { data: workflows, error } = await supabase.from("content_workflows").select("content_id, review_state, scheduled_for, author_id, reviewer_id").not("scheduled_for", "is", null).order("scheduled_for");
  if (error) throw new Error("Unable to load the editorial schedule.");
  const ids = (workflows ?? []).map((entry) => entry.content_id);
  const { data: content } = ids.length ? await supabase.from("content_items").select("id, title, content_type, status").in("id", ids) : { data: [] };
  const scheduled = (workflows ?? []).flatMap((workflow) => { const item = content?.find((entry) => entry.id === workflow.content_id); return item && workflow.scheduled_for ? [{ ...workflow, ...item, scheduledFor: new Date(workflow.scheduled_for) }] : []; });
  const firstOffset = (new Date(Date.UTC(year, month - 1, 1)).getUTCDay() + 6) % 7;
  const daysInMonth = new Date(Date.UTC(year, month, 0)).getUTCDate(); const cellCount = Math.ceil((firstOffset + daysInMonth) / 7) * 7;
  const monthLabel = new Intl.DateTimeFormat("en", { month: "long", year: "numeric", timeZone: "UTC" }).format(new Date(Date.UTC(year, month - 1, 1)));
  const now = new Date(); const due = scheduled.filter((entry) => entry.scheduledFor <= now && entry.status !== "published");

  return <main id="main-content"><header className="dashboard-page-header"><div><p className="dashboard-kicker">Publishing rhythm</p><h1>Editorial calendar</h1><p>Plan approved content, inspect the live queue, and release due publications deliberately.</p></div><Link className="dashboard-primary-action" href="/admin/content/new"><PlusIcon />Plan content</Link></header>
    {query.published !== undefined && <div className="editor-notice success" role="status">{query.published} due item{query.published === "1" ? "" : "s"} published.</div>}{query.error && <div className="editor-notice error" role="alert">Due content could not be published.</div>}
    <section className="calendar-layout"><article className="dashboard-panel calendar-board"><div className="panel-heading calendar-heading"><div><p className="dashboard-kicker">Real publication dates</p><h2>{monthLabel}</h2></div><nav aria-label="Calendar month"><Link href={`/admin/calendar?month=${shiftMonth(selectedMonth, -1)}`}>← Previous</Link><Link href="/admin/calendar">Today</Link><Link href={`/admin/calendar?month=${shiftMonth(selectedMonth, 1)}`}>Next →</Link></nav></div><div className="calendar-week real-calendar"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>{Array.from({ length: cellCount }, (_, index) => { const day = index - firstOffset + 1; const events = day >= 1 && day <= daysInMonth ? scheduled.filter((entry) => entry.scheduledFor.getFullYear() === year && entry.scheduledFor.getMonth() + 1 === month && entry.scheduledFor.getDate() === day) : []; return <div className={day < 1 || day > daysInMonth ? "outside" : ""} key={index}>{day >= 1 && day <= daysInMonth && <strong>{day}</strong>}{events.map((entry) => <Link className={`calendar-event ${entry.review_state === "approved" ? "green" : "amber"}`} href={`/admin/content/${entry.content_id}/edit#workflow`} key={entry.content_id}>{entry.title}<small>{new Intl.DateTimeFormat("en", { hour: "numeric", minute: "2-digit" }).format(entry.scheduledFor)} · {entry.review_state.replaceAll("-", " ")}</small></Link>)}</div>; })}</div></article>
      <aside className="calendar-side-stack"><section className="dashboard-panel calendar-aside"><CalendarIcon /><p className="dashboard-kicker">Due queue</p><h2>{due.length} ready to evaluate</h2><p>Only due items with an approved editorial review can be published by this action. Unapproved items remain private.</p><form action={publishDueContent}><button type="submit" disabled={!due.some((entry) => entry.review_state === "approved")}>Publish approved due items</button></form><small>For hosted automation later, connect the same protected database function to a trusted scheduler.</small></section><section className="dashboard-panel schedule-list"><p className="dashboard-kicker">Upcoming</p>{scheduled.length ? <ol>{scheduled.slice(0, 8).map((entry) => <li key={entry.content_id}><time dateTime={entry.scheduledFor.toISOString()}>{new Intl.DateTimeFormat("en", { month: "short", day: "numeric", hour: "numeric", minute: "2-digit" }).format(entry.scheduledFor)}</time><Link href={`/admin/content/${entry.content_id}/edit#workflow`}>{entry.title}</Link><span className={`workflow-state ${entry.review_state}`}>{entry.review_state.replaceAll("-", " ")}</span></li>)}</ol> : <p>No content has a planned publication date yet.</p>}</section></aside>
    </section></main>;
}
