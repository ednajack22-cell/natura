const baseUrl = (process.env.NATURA_BASE_URL ?? "http://127.0.0.1:3000").replace(/\/$/, "");

try {
  const response = await fetch(`${baseUrl}/healthz`, {
    headers: { accept: "application/json" },
    signal: AbortSignal.timeout(5_000),
  });
  const payload = await response.json();

  if (!response.ok || payload.status !== "ok") {
    throw new Error(`Health endpoint returned HTTP ${response.status}.`);
  }

  console.log(`Natura health check passed (${baseUrl}).`);
} catch (error) {
  console.error(error instanceof Error ? error.message : "Natura health check failed.");
  process.exitCode = 1;
}
