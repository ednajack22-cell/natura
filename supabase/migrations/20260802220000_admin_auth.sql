create or replace function public.handle_new_admin_user()
returns trigger
language plpgsql
security definer set search_path = ''
as $$
begin
  if coalesce(new.raw_app_meta_data ->> 'natura_admin', 'false') = 'true' then
    insert into public.profiles (id, role, display_name)
    values (new.id, 'admin', coalesce(new.raw_user_meta_data ->> 'display_name', split_part(new.email, '@', 1)))
    on conflict (id) do update set
      role = 'admin',
      display_name = excluded.display_name,
      updated_at = now();
  end if;
  return new;
end;
$$;

drop trigger if exists on_admin_user_created on auth.users;
create trigger on_admin_user_created
  after insert or update of raw_app_meta_data, raw_user_meta_data on auth.users
  for each row execute procedure public.handle_new_admin_user();
