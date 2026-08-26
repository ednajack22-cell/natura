# Natura access model

Natura currently has two access levels and one device-only preference.

## Public reader

Readers do not create an account and do not sign in. They can read every published page and use public search, calendars, diagnostics, calculators, and planning tools. Supabase Row Level Security exposes only published editorial records to anonymous requests.

## Garden Profile

The Garden Profile is not an account. It stores five broad preferences (climate, hemisphere, growing space, sunlight, and exposure) in one essential, HTTP-only cookie on the reader's current device. It contains no name, email address, password, account identifier, precise location, or server-side reader profile. The reader can remove it from the Garden Profile page.

## Administrator

The administrator is an authenticated member of Natura's editorial team. Server-side checks require both a valid Supabase session and the `admin` role before any private dashboard, draft, publishing, media, history, contributor, or settings operation is allowed.

Public registration, anonymous authentication, email sign-up, and SMS sign-up are disabled. Natura does not currently have a signed-in reader/member area.

## Future decision

If Natura later adds saved gardens across devices, newsletters with preferences, comments, or reader-owned records, that should be designed as a separate reader-account product. It must not reuse the administrator role or make the current device-only Garden Profile appear to be an account.
