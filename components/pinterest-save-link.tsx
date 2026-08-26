import { pinterestImagePath } from "@/lib/social-discovery";

type PinterestSaveLinkProps = { title: string; description: string; canonicalPath: string; label: string };

export function PinterestSaveLink(props: PinterestSaveLinkProps) {
  const base = process.env.NEXT_PUBLIC_SITE_URL ?? "http://localhost:3000";
  const target = new URL("https://www.pinterest.com/pin/create/button/");
  target.searchParams.set("url", `${base}${props.canonicalPath}`);
  target.searchParams.set("media", `${base}${pinterestImagePath(props)}`);
  target.searchParams.set("description", `${props.title}. ${props.description}`.slice(0, 500));
  return <div className="site-container pinterest-save-bar"><div><span aria-hidden="true">P</span><p><strong>Keep this guide.</strong> Save the vertical Natura card to a relevant Pinterest board.</p></div><a href={target.toString()} target="_blank" rel="noreferrer">Save to Pinterest</a></div>;
}
