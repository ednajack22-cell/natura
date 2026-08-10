"use client";

import { useMemo, useState } from "react";
import { ArrowIcon, DownloadIcon } from "@/components/icons";

const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

export function CalendarPdfSelector({ slug, initialMonth }: { slug: string; initialMonth: number }) {
  const [selectedMonths, setSelectedMonths] = useState<number[]>([initialMonth]);
  const query = useMemo(() => [...selectedMonths].sort((a, b) => a - b).join(","), [selectedMonths]);
  const toggleMonth = (month: number) => setSelectedMonths((current) => current.includes(month) ? current.filter((item) => item !== month) : [...current, month]);
  const selectedLabel = selectedMonths.length === 0 ? "Choose at least one month" : selectedMonths.length === 1 ? "1 month selected" : `${selectedMonths.length} months selected`;

  return <section className="calendar-pdf-card calendar-pdf-selector">
    <DownloadIcon />
    <p className="eyebrow">Custom PDF</p>
    <h2>Print only the months you need.</h2>
    <p>Select one month, two months, or any useful combination.</p>
    <div className="pdf-month-actions"><button type="button" onClick={() => setSelectedMonths(months.map((_, index) => index + 1))}>Select all</button><button type="button" onClick={() => setSelectedMonths([])}>Clear</button></div>
    <fieldset className="pdf-month-grid"><legend className="sr-only">Months to include in the PDF</legend>{months.map((month, index) => { const number = index + 1; const selected = selectedMonths.includes(number); return <label className={selected ? "selected" : ""} key={month}><input type="checkbox" checked={selected} onChange={() => toggleMonth(number)} /><span>{String(number).padStart(2, "0")}</span><strong>{month}</strong></label>; })}</fieldset>
    <span className="pdf-selection-count" aria-live="polite">{selectedLabel}</span>
    {selectedMonths.length > 0 ? <a className="pdf-selected-download" href={`/api/calendars/${slug}/pdf?months=${query}`}>Download selected months <ArrowIcon /></a> : <span className="pdf-selected-download disabled" aria-disabled="true">Select a month to continue</span>}
    <a className="pdf-full-download" href={`/api/calendars/${slug}/pdf`}>Or download the complete 12-month PDF</a>
  </section>;
}
