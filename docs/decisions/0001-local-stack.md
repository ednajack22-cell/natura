# 0001 - Construire Natura localement avant de choisir l'hébergement

Date : 2026-08-02

## Décision

Utiliser Next.js, TypeScript, Tailwind CSS et Supabase local/PostgreSQL pendant la construction. Reporter le choix de l'hébergement public jusqu'à une préproduction mesurable.

## Conséquences

- Les schémas, migrations, politiques RLS et données de démonstration sont versionnés.
- La pile locale ne doit jamais être exposée à Internet.
- Le code évite les API propres à un hébergeur lorsque ce n'est pas nécessaire.
- Une préproduction distante précède obligatoirement le lancement public.
