import { PlantMediaPicker } from "@/components/admin/plant-media-picker";

type GuideProfileFieldsProps = {
  profile: {
    guideType: string;
    difficulty: string;
    estimatedTime: number;
    audience: string;
    prerequisites: string;
    materials: string;
    steps: string;
    tips: string;
    warnings: string;
    image: string;
    imageAlt: string;
  };
  assets: Array<{ id: string; url: string; altText: string; credit: string | null; license: string }>;
  plants: Array<{ id: string; slug: string; title: string }>;
  linkedPlantIds: Set<string>;
};

export function GuideProfileFields({ profile, assets, plants, linkedPlantIds }: GuideProfileFieldsProps) {
  return <section className="dashboard-panel editor-section" id="guide-profile">
    <div className="editor-section-heading"><span>03</span><div><p className="dashboard-kicker">Guide database</p><h2>Step-by-step project</h2><small>These fields create a consistent public guide, reading time, preparation list, and HowTo structure.</small></div></div>
    <div className="editor-field-grid"><label><span>Guide type</span><select name="guideType" defaultValue={profile.guideType}><option value="balcony">Balcony</option><option value="container">Container</option><option value="indoor">Indoor</option><option value="beginner">Beginner</option><option value="seasonal">Seasonal</option></select></label><label><span>Difficulty</span><select name="guideDifficulty" defaultValue={profile.difficulty}><option value="easy">Easy</option><option value="moderate">Moderate</option><option value="advanced">Advanced</option></select></label></div>
    <div className="editor-field-grid"><label><span>Estimated active time</span><div className="field-with-suffix"><input type="number" name="estimatedTime" defaultValue={profile.estimatedTime} min={5} max={1440} /><span>minutes</span></div></label><label><span>Designed audience</span><input name="guideAudience" defaultValue={profile.audience} maxLength={500} placeholder="First-time balcony gardeners…" /></label></div>
    <label><span>Prerequisites</span><textarea name="guidePrerequisites" defaultValue={profile.prerequisites} rows={5} maxLength={3000} /><small>One condition or check per line.</small></label>
    <label><span>Materials and supplies</span><textarea name="guideMaterials" defaultValue={profile.materials} rows={6} maxLength={4000} /><small>One item per line. Keep quantities and alternatives practical.</small></label>
    <label><span>Ordered method</span><textarea name="guideSteps" defaultValue={profile.steps} rows={10} maxLength={8000} /><small>One step per line: Title | Practical instruction. At least four complete steps are required.</small></label>
    <label><span>Field notes</span><textarea name="guideTips" defaultValue={profile.tips} rows={5} maxLength={3000} /><small>One useful tip per line.</small></label>
    <label><span>Safety and limits</span><textarea name="guideWarnings" defaultValue={profile.warnings} rows={4} maxLength={3000} /><small>One warning, structural limit, or reason to seek specialist advice per line.</small></label>
    <PlantMediaPicker initialImage={profile.image} initialAlt={profile.imageAlt} assets={assets} imageFieldName="guideImage" altFieldName="guideImageAlt" />
    <fieldset className="related-plant-selector"><legend>Plants used in this guide</legend><p>Select the growing profiles that readers should be able to open from the guide.</p><div>{plants.map((plant) => <label key={plant.id}><input type="checkbox" name="guideRelatedPlants" value={plant.id} defaultChecked={linkedPlantIds.has(plant.id)} /><span><strong>{plant.title}</strong><small>/plants/{plant.slug}</small></span></label>)}</div></fieldset>
  </section>;
}
