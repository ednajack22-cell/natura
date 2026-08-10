import { PlantMediaPicker } from "@/components/admin/plant-media-picker";

type ProblemProfileFieldsProps = {
  profile: {
    category: string;
    urgency: string;
    symptoms: string;
    likelyCauses: string;
    verificationSteps: string;
    recommendedActions: string;
    warnings: string;
    image: string;
    imageAlt: string;
  };
  assets: Array<{ id: string; url: string; altText: string; credit: string | null; license: string }>;
  plants: Array<{ id: string; slug: string; title: string }>;
  linkedPlantIds: Set<string>;
};

export function ProblemProfileFields({ profile, assets, plants, linkedPlantIds }: ProblemProfileFieldsProps) {
  return <section className="dashboard-panel editor-section" id="problem-profile">
    <div className="editor-section-heading"><span>03</span><div><p className="dashboard-kicker">Diagnostic database</p><h2>Observation-led diagnostic</h2><small>These structured fields power the public diagnostic and its links to plant guides.</small></div></div>
    <div className="editor-field-grid"><label><span>Problem category</span><select name="problemCategory" defaultValue={profile.category}><option value="watering">Watering</option><option value="nutrition">Nutrition</option><option value="pest">Pest</option><option value="disease">Disease</option><option value="environment">Environment</option><option value="other">Other</option></select></label><label><span>Attention level</span><select name="urgency" defaultValue={profile.urgency}><option value="low">Low</option><option value="moderate">Moderate</option><option value="high">High</option></select></label></div>
    <label><span>Observable symptoms</span><textarea name="symptoms" defaultValue={profile.symptoms} rows={5} maxLength={3000} /><small>One symptom per line. At least two are required before publication.</small></label>
    <label><span>Likely causes</span><textarea name="likelyCauses" defaultValue={profile.likelyCauses} rows={7} maxLength={5000} /><small>One cause per line: Title | Explanation.</small></label>
    <label><span>Verification steps</span><textarea name="verificationSteps" defaultValue={profile.verificationSteps} rows={7} maxLength={5000} /><small>One test per line: Title | What the reader should check.</small></label>
    <label><span>Recommended actions</span><textarea name="recommendedActions" defaultValue={profile.recommendedActions} rows={7} maxLength={5000} /><small>One action per line: Title | Safe practical action.</small></label>
    <label><span>Warnings and escalation</span><textarea name="warnings" defaultValue={profile.warnings} rows={4} maxLength={3000} /><small>One safety note or reason to seek specialist advice per line.</small></label>
    <PlantMediaPicker initialImage={profile.image} initialAlt={profile.imageAlt} assets={assets} imageFieldName="problemImage" altFieldName="problemImageAlt" />
    <fieldset className="related-plant-selector"><legend>Related plant guides</legend><p>Select every plant for which this diagnostic is relevant.</p><div>{plants.map((plant) => <label key={plant.id}><input type="checkbox" name="relatedPlants" value={plant.id} defaultChecked={linkedPlantIds.has(plant.id)} /><span><strong>{plant.title}</strong><small>/plants/{plant.slug}</small></span></label>)}</div></fieldset>
  </section>;
}
