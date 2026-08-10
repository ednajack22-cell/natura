type ContributorChoice = { id: string; displayName: string; roleTitle: string };

type Props = {
  contributors: ContributorChoice[];
  workflow: { authorId: string; reviewerId: string; reviewState: string; reviewNotes: string; scheduledFor: string };
};

const reviewLabels: Record<string, string> = { unassigned: "Not reviewed", "in-review": "In review", "changes-requested": "Changes requested", approved: "Approved" };

export function EditorialWorkflowFields({ contributors, workflow }: Props) {
  return <section className="dashboard-panel editor-section" id="workflow"><div className="editor-section-heading"><span>07</span><div><p className="dashboard-kicker">Accountability</p><h2>Author, review, and schedule</h2><small>Assign responsibility, record the review decision, and plan publication.</small></div></div>
    <div className="workflow-state-strip"><div><span>Review state</span><strong className={`workflow-state ${workflow.reviewState}`}>{reviewLabels[workflow.reviewState] ?? workflow.reviewState}</strong></div>{workflow.scheduledFor && <div><span>Scheduled</span><strong>{new Intl.DateTimeFormat("en", { dateStyle: "medium", timeStyle: "short" }).format(new Date(workflow.scheduledFor))}</strong></div>}</div>
    <div className="editor-field-grid"><label><span>Responsible author</span><select name="workflowAuthorId" defaultValue={workflow.authorId}><option value="">Select an author</option>{contributors.map((person) => <option value={person.id} key={person.id}>{person.displayName} — {person.roleTitle}</option>)}</select></label><label><span>Assigned reviewer</span><select name="workflowReviewerId" defaultValue={workflow.reviewerId}><option value="">Select a reviewer</option>{contributors.map((person) => <option value={person.id} key={person.id}>{person.displayName} — {person.roleTitle}</option>)}</select><small>The reviewer must be different from the author.</small></label></div>
    <label><span>Review notes</span><textarea name="workflowReviewNotes" defaultValue={workflow.reviewNotes} rows={4} maxLength={3000} placeholder="Record requested changes, verification notes, or the approval basis." /></label>
    <label><span>Planned publication</span><input type="datetime-local" name="workflowScheduledFor" defaultValue={workflow.scheduledFor ? new Date(workflow.scheduledFor).toISOString().slice(0, 16) : ""} /><small>Scheduling does not publish by itself while the local computer is off. Approved due items can be released from the editorial calendar.</small></label>
  </section>;
}
