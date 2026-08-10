import { PlantMediaPicker } from "@/components/admin/plant-media-picker";

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

type CalendarProfileFieldsProps = {
  profile: { climate: string; hemisphere: string; spaceType: string; scopeNote: string; warnings: string; image: string; imageAlt: string; monthEntries: Record<number, string> };
  assets: Array<{ id: string; url: string; altText: string; credit: string | null; license: string }>;
  plants: Array<{ id: string; slug: string; title: string }>;
  linkedPlantIds: Set<string>;
};

export function CalendarProfileFields({ profile, assets, plants, linkedPlantIds }: CalendarProfileFieldsProps) {
  return <section className="dashboard-panel editor-section" id="calendar-profile">
    <div className="editor-section-heading"><span>03</span><div><p className="dashboard-kicker">Calendar database</p><h2>Condition-aware monthly plan</h2><small>Define the calendar context once, then manage ordered tasks for each month.</small></div></div>
    <div className="editor-field-grid"><label><span>Climate context</span><select name="calendarClimate" defaultValue={profile.climate}><option value="general">General</option><option value="temperate">Temperate</option><option value="mediterranean">Mediterranean</option><option value="continental">Continental</option><option value="tropical">Tropical</option></select></label><label><span>Hemisphere</span><select name="calendarHemisphere" defaultValue={profile.hemisphere}><option value="northern">Northern</option><option value="southern">Southern</option><option value="both">Both</option></select></label></div>
    <div className="editor-field-grid"><label><span>Growing space</span><select name="calendarSpaceType" defaultValue={profile.spaceType}><option value="all">All spaces</option><option value="balcony">Balcony</option><option value="container">Container</option><option value="garden">Garden</option><option value="indoor">Indoor</option></select></label><label><span>Calendar scope</span><input name="calendarScopeNote" defaultValue={profile.scopeNote} maxLength={600} placeholder="Who and which conditions this calendar is designed for…" /></label></div>
    <label><span>Climate and safety warnings</span><textarea name="calendarWarnings" defaultValue={profile.warnings} rows={4} maxLength={3000} /><small>One limitation or condition check per line.</small></label>
    <PlantMediaPicker initialImage={profile.image} initialAlt={profile.imageAlt} assets={assets} imageFieldName="calendarImage" altFieldName="calendarImageAlt" />
    <div className="calendar-month-editor"><div className="calendar-month-editor-heading"><div><p className="dashboard-kicker">Twelve-month plan</p><h3>Monthly activities</h3></div><p>One task per line: Activity | Title | Description | Priority. Activity: plan, sow-indoors, sow-outdoors, plant, harvest, care, protect.</p></div>{months.map((month, index) => <details open={index === new Date().getMonth()} key={month}><summary><span>{String(index + 1).padStart(2, "0")}</span><strong>{month}</strong><small>{profile.monthEntries[index + 1]?.split("\n").filter(Boolean).length ?? 0} tasks</small></summary><label><span>{month} activities</span><textarea name={`calendarMonth${index + 1}`} defaultValue={profile.monthEntries[index + 1] ?? ""} rows={6} maxLength={6000} placeholder="plant | Plant tomatoes | Harden plants off first… | high" /></label></details>)}</div>
    <fieldset className="related-plant-selector"><legend>Plants covered by this calendar</legend><p>Select every plant whose growing profile should link to this calendar.</p><div>{plants.map((plant) => <label key={plant.id}><input type="checkbox" name="calendarRelatedPlants" value={plant.id} defaultChecked={linkedPlantIds.has(plant.id)} /><span><strong>{plant.title}</strong><small>/plants/{plant.slug}</small></span></label>)}</div></fieldset>
  </section>;
}
