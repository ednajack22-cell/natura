import Image from "next/image";
import Link from "next/link";
import { ArrowIcon } from "@/components/icons";
import type { PlantProfile } from "@/lib/plants";

export function PlantCard({ plant, priority = false }: { plant: PlantProfile; priority?: boolean }) {
  return (
    <Link className="plant-card" href={`/plants/${plant.slug}`}>
      <div className="plant-card-media">
        <Image
          src={plant.image}
          alt={plant.imageAlt}
          fill
          priority={priority}
          sizes="(max-width: 760px) 100vw, (max-width: 1100px) 50vw, 33vw"
        />
        <span className="plant-card-category">{plant.category}</span>
        <span className="plant-card-difficulty">{plant.difficulty}</span>
      </div>
      <div className="plant-card-copy">
        <p className="plant-botanical">{plant.botanicalName}</p>
        <h3>{plant.name}</h3>
        <p>{plant.tagline}</p>
        <div className="plant-card-facts">
          <span><small>Light</small>{plant.sunlight}</span>
          <span><small>Pot</small>{plant.potSize}</span>
        </div>
        <span className="text-link">Open the growing guide <ArrowIcon /></span>
      </div>
    </Link>
  );
}
