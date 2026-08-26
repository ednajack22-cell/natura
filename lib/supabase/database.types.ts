export type Json =
  | string
  | number
  | boolean
  | null
  | { [key: string]: Json | undefined }
  | Json[]

export type Database = {
  graphql_public: {
    Tables: {
      [_ in never]: never
    }
    Views: {
      [_ in never]: never
    }
    Functions: {
      graphql: {
        Args: {
          extensions?: Json
          operationName?: string
          query?: string
          variables?: Json
        }
        Returns: Json
      }
    }
    Enums: {
      [_ in never]: never
    }
    CompositeTypes: {
      [_ in never]: never
    }
  }
  public: {
    Tables: {
      calendar_entries: {
        Row: {
          activity_type: string
          calendar_content_id: string
          created_at: string
          description: string
          id: string
          month: number
          priority: string
          sort_order: number
          title: string
        }
        Insert: {
          activity_type: string
          calendar_content_id: string
          created_at?: string
          description?: string
          id?: string
          month: number
          priority?: string
          sort_order?: number
          title: string
        }
        Update: {
          activity_type?: string
          calendar_content_id?: string
          created_at?: string
          description?: string
          id?: string
          month?: number
          priority?: string
          sort_order?: number
          title?: string
        }
        Relationships: [
          {
            foreignKeyName: "calendar_entries_calendar_content_id_fkey"
            columns: ["calendar_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      calendar_plant_links: {
        Row: {
          calendar_content_id: string
          plant_content_id: string
        }
        Insert: {
          calendar_content_id: string
          plant_content_id: string
        }
        Update: {
          calendar_content_id?: string
          plant_content_id?: string
        }
        Relationships: [
          {
            foreignKeyName: "calendar_plant_links_calendar_content_id_fkey"
            columns: ["calendar_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "calendar_plant_links_plant_content_id_fkey"
            columns: ["plant_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      calendar_profiles: {
        Row: {
          climate: string
          content_id: string
          hemisphere: string
          image_alt: string | null
          image_url: string | null
          scope_note: string
          space_type: string
          updated_at: string
          warnings: string[]
        }
        Insert: {
          climate: string
          content_id: string
          hemisphere?: string
          image_alt?: string | null
          image_url?: string | null
          scope_note?: string
          space_type?: string
          updated_at?: string
          warnings?: string[]
        }
        Update: {
          climate?: string
          content_id?: string
          hemisphere?: string
          image_alt?: string | null
          image_url?: string | null
          scope_note?: string
          space_type?: string
          updated_at?: string
          warnings?: string[]
        }
        Relationships: [
          {
            foreignKeyName: "calendar_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      content_items: {
        Row: {
          body: Json
          content_type: string
          created_at: string
          created_by: string | null
          excerpt: string | null
          id: string
          published_at: string | null
          search_vector: unknown
          seo_description: string | null
          seo_title: string | null
          slug: string
          status: Database["public"]["Enums"]["content_status"]
          title: string
          updated_at: string
        }
        Insert: {
          body?: Json
          content_type: string
          created_at?: string
          created_by?: string | null
          excerpt?: string | null
          id?: string
          published_at?: string | null
          search_vector?: unknown
          seo_description?: string | null
          seo_title?: string | null
          slug: string
          status?: Database["public"]["Enums"]["content_status"]
          title: string
          updated_at?: string
        }
        Update: {
          body?: Json
          content_type?: string
          created_at?: string
          created_by?: string | null
          excerpt?: string | null
          id?: string
          published_at?: string | null
          search_vector?: unknown
          seo_description?: string | null
          seo_title?: string | null
          slug?: string
          status?: Database["public"]["Enums"]["content_status"]
          title?: string
          updated_at?: string
        }
        Relationships: [
          {
            foreignKeyName: "content_items_created_by_fkey"
            columns: ["created_by"]
            isOneToOne: false
            referencedRelation: "profiles"
            referencedColumns: ["id"]
          },
        ]
      }
      content_revisions: {
        Row: {
          content_id: string
          created_at: string
          created_by: string | null
          id: number
          snapshot: Json
          version: number
        }
        Insert: {
          content_id: string
          created_at?: string
          created_by?: string | null
          id?: never
          snapshot: Json
          version: number
        }
        Update: {
          content_id?: string
          created_at?: string
          created_by?: string | null
          id?: never
          snapshot?: Json
          version?: number
        }
        Relationships: [
          {
            foreignKeyName: "content_revisions_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "content_revisions_created_by_fkey"
            columns: ["created_by"]
            isOneToOne: false
            referencedRelation: "profiles"
            referencedColumns: ["id"]
          },
        ]
      }
      content_workflows: {
        Row: {
          approved_at: string | null
          approved_by: string | null
          author_id: string | null
          content_id: string
          review_notes: string
          review_state: string
          reviewer_id: string | null
          scheduled_for: string | null
          updated_at: string
        }
        Insert: {
          approved_at?: string | null
          approved_by?: string | null
          author_id?: string | null
          content_id: string
          review_notes?: string
          review_state?: string
          reviewer_id?: string | null
          scheduled_for?: string | null
          updated_at?: string
        }
        Update: {
          approved_at?: string | null
          approved_by?: string | null
          author_id?: string | null
          content_id?: string
          review_notes?: string
          review_state?: string
          reviewer_id?: string | null
          scheduled_for?: string | null
          updated_at?: string
        }
        Relationships: [
          {
            foreignKeyName: "content_workflows_approved_by_fkey"
            columns: ["approved_by"]
            isOneToOne: false
            referencedRelation: "profiles"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "content_workflows_author_id_fkey"
            columns: ["author_id"]
            isOneToOne: false
            referencedRelation: "editorial_contributors"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "content_workflows_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "content_workflows_reviewer_id_fkey"
            columns: ["reviewer_id"]
            isOneToOne: false
            referencedRelation: "editorial_contributors"
            referencedColumns: ["id"]
          },
        ]
      }
      editorial_contributors: {
        Row: {
          bio: string
          conflicts: string
          created_at: string
          display_name: string
          expertise: string[]
          id: string
          is_active: boolean
          is_public: boolean
          role_title: string
          slug: string
          updated_at: string
        }
        Insert: {
          bio?: string
          conflicts?: string
          created_at?: string
          display_name: string
          expertise?: string[]
          id?: string
          is_active?: boolean
          is_public?: boolean
          role_title?: string
          slug: string
          updated_at?: string
        }
        Update: {
          bio?: string
          conflicts?: string
          created_at?: string
          display_name?: string
          expertise?: string[]
          id?: string
          is_active?: boolean
          is_public?: boolean
          role_title?: string
          slug?: string
          updated_at?: string
        }
        Relationships: []
      }
      editorial_events: {
        Row: {
          action: string
          actor_id: string | null
          content_id: string | null
          created_at: string
          id: number
          metadata: Json
          next_status: Database["public"]["Enums"]["content_status"] | null
          previous_status: Database["public"]["Enums"]["content_status"] | null
        }
        Insert: {
          action: string
          actor_id?: string | null
          content_id?: string | null
          created_at?: string
          id?: never
          metadata?: Json
          next_status?: Database["public"]["Enums"]["content_status"] | null
          previous_status?: Database["public"]["Enums"]["content_status"] | null
        }
        Update: {
          action?: string
          actor_id?: string | null
          content_id?: string | null
          created_at?: string
          id?: never
          metadata?: Json
          next_status?: Database["public"]["Enums"]["content_status"] | null
          previous_status?: Database["public"]["Enums"]["content_status"] | null
        }
        Relationships: [
          {
            foreignKeyName: "editorial_events_actor_id_fkey"
            columns: ["actor_id"]
            isOneToOne: false
            referencedRelation: "profiles"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "editorial_events_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      guide_plant_links: {
        Row: {
          guide_content_id: string
          plant_content_id: string
        }
        Insert: {
          guide_content_id: string
          plant_content_id: string
        }
        Update: {
          guide_content_id?: string
          plant_content_id?: string
        }
        Relationships: [
          {
            foreignKeyName: "guide_plant_links_guide_content_id_fkey"
            columns: ["guide_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "guide_plant_links_plant_content_id_fkey"
            columns: ["plant_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      guide_profiles: {
        Row: {
          audience: string
          content_id: string
          difficulty: string
          estimated_time_minutes: number
          guide_type: string
          image_alt: string | null
          image_url: string | null
          materials: string[]
          prerequisites: string[]
          steps: Json
          tips: string[]
          updated_at: string
          warnings: string[]
        }
        Insert: {
          audience?: string
          content_id: string
          difficulty?: string
          estimated_time_minutes?: number
          guide_type: string
          image_alt?: string | null
          image_url?: string | null
          materials?: string[]
          prerequisites?: string[]
          steps?: Json
          tips?: string[]
          updated_at?: string
          warnings?: string[]
        }
        Update: {
          audience?: string
          content_id?: string
          difficulty?: string
          estimated_time_minutes?: number
          guide_type?: string
          image_alt?: string | null
          image_url?: string | null
          materials?: string[]
          prerequisites?: string[]
          steps?: Json
          tips?: string[]
          updated_at?: string
          warnings?: string[]
        }
        Relationships: [
          {
            foreignKeyName: "guide_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      institutional_page_profiles: {
        Row: {
          contact_email: string | null
          content_id: string
          eyebrow: string
          last_reviewed_on: string | null
          notice: string
          page_kind: string
          requires_legal_review: boolean
          sections: Json
          updated_at: string
        }
        Insert: {
          contact_email?: string | null
          content_id: string
          eyebrow?: string
          last_reviewed_on?: string | null
          notice?: string
          page_kind: string
          requires_legal_review?: boolean
          sections?: Json
          updated_at?: string
        }
        Update: {
          contact_email?: string | null
          content_id?: string
          eyebrow?: string
          last_reviewed_on?: string | null
          notice?: string
          page_kind?: string
          requires_legal_review?: boolean
          sections?: Json
          updated_at?: string
        }
        Relationships: [
          {
            foreignKeyName: "institutional_page_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      media_assets: {
        Row: {
          alt_text: string
          bucket: string
          created_at: string
          created_by: string | null
          credit: string | null
          file_size: number | null
          height: number | null
          id: string
          license: string
          mime_type: string | null
          object_path: string
          original_name: string | null
          updated_at: string
          width: number | null
        }
        Insert: {
          alt_text: string
          bucket?: string
          created_at?: string
          created_by?: string | null
          credit?: string | null
          file_size?: number | null
          height?: number | null
          id?: string
          license?: string
          mime_type?: string | null
          object_path: string
          original_name?: string | null
          updated_at?: string
          width?: number | null
        }
        Update: {
          alt_text?: string
          bucket?: string
          created_at?: string
          created_by?: string | null
          credit?: string | null
          file_size?: number | null
          height?: number | null
          id?: string
          license?: string
          mime_type?: string | null
          object_path?: string
          original_name?: string | null
          updated_at?: string
          width?: number | null
        }
        Relationships: [
          {
            foreignKeyName: "media_assets_created_by_fkey"
            columns: ["created_by"]
            isOneToOne: false
            referencedRelation: "profiles"
            referencedColumns: ["id"]
          },
        ]
      }
      plant_finder_profiles: {
        Row: {
          care_level: string
          climates: string[]
          content_id: string
          edible: boolean
          match_note: string
          min_sun_hours: number
          space_types: string[]
          updated_at: string
        }
        Insert: {
          care_level?: string
          climates?: string[]
          content_id: string
          edible?: boolean
          match_note?: string
          min_sun_hours?: number
          space_types?: string[]
          updated_at?: string
        }
        Update: {
          care_level?: string
          climates?: string[]
          content_id?: string
          edible?: boolean
          match_note?: string
          min_sun_hours?: number
          space_types?: string[]
          updated_at?: string
        }
        Relationships: [
          {
            foreignKeyName: "plant_finder_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      plant_search_popularity: {
        Row: {
          last_searched_at: string
          plant_content_id: string
          search_count: number
        }
        Insert: {
          last_searched_at?: string
          plant_content_id: string
          search_count?: number
        }
        Update: {
          last_searched_at?: string
          plant_content_id?: string
          search_count?: number
        }
        Relationships: [
          {
            foreignKeyName: "plant_search_popularity_plant_content_id_fkey"
            columns: ["plant_content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      problem_plant_links: {
        Row: {
          plant_content_id: string
          problem_content_id: string
        }
        Insert: {
          plant_content_id: string
          problem_content_id: string
        }
        Update: {
          plant_content_id?: string
          problem_content_id?: string
        }
        Relationships: [
          {
            foreignKeyName: "problem_plant_links_plant_content_id_fkey"
            columns: ["plant_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "problem_plant_links_problem_content_id_fkey"
            columns: ["problem_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      problem_profiles: {
        Row: {
          category: string
          content_id: string
          image_alt: string | null
          image_url: string | null
          likely_causes: Json
          recommended_actions: Json
          symptoms: string[]
          updated_at: string
          urgency: string
          verification_steps: Json
          warnings: string[]
        }
        Insert: {
          category: string
          content_id: string
          image_alt?: string | null
          image_url?: string | null
          likely_causes?: Json
          recommended_actions?: Json
          symptoms?: string[]
          updated_at?: string
          urgency?: string
          verification_steps?: Json
          warnings?: string[]
        }
        Update: {
          category?: string
          content_id?: string
          image_alt?: string | null
          image_url?: string | null
          likely_causes?: Json
          recommended_actions?: Json
          symptoms?: string[]
          updated_at?: string
          urgency?: string
          verification_steps?: Json
          warnings?: string[]
        }
        Relationships: [
          {
            foreignKeyName: "problem_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      profiles: {
        Row: {
          created_at: string
          display_name: string | null
          id: string
          role: Database["public"]["Enums"]["user_role"]
          updated_at: string
        }
        Insert: {
          created_at?: string
          display_name?: string | null
          id: string
          role?: Database["public"]["Enums"]["user_role"]
          updated_at?: string
        }
        Update: {
          created_at?: string
          display_name?: string | null
          id?: string
          role?: Database["public"]["Enums"]["user_role"]
          updated_at?: string
        }
        Relationships: []
      }
      review_criteria: {
        Row: {
          description: string
          id: string
          name: string
          review_content_id: string
          sort_order: number
          weight: number
        }
        Insert: {
          description?: string
          id?: string
          name: string
          review_content_id: string
          sort_order?: number
          weight?: number
        }
        Update: {
          description?: string
          id?: string
          name?: string
          review_content_id?: string
          sort_order?: number
          weight?: number
        }
        Relationships: [
          {
            foreignKeyName: "review_criteria_review_content_id_fkey"
            columns: ["review_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      review_product_scores: {
        Row: {
          criterion_id: string
          note: string
          product_id: string
          score: number
        }
        Insert: {
          criterion_id: string
          note?: string
          product_id: string
          score: number
        }
        Update: {
          criterion_id?: string
          note?: string
          product_id?: string
          score?: number
        }
        Relationships: [
          {
            foreignKeyName: "review_product_scores_criterion_id_fkey"
            columns: ["criterion_id"]
            isOneToOne: false
            referencedRelation: "review_criteria"
            referencedColumns: ["id"]
          },
          {
            foreignKeyName: "review_product_scores_product_id_fkey"
            columns: ["product_id"]
            isOneToOne: false
            referencedRelation: "review_products"
            referencedColumns: ["id"]
          },
        ]
      }
      review_products: {
        Row: {
          brand: string
          cons: string[]
          id: string
          image_alt: string | null
          image_url: string | null
          is_recommended: boolean
          model: string
          name: string
          overall_score: number
          price_note: string
          product_url: string | null
          pros: string[]
          review_content_id: string
          sort_order: number
          specifications: Json
          verdict_label: string
        }
        Insert: {
          brand?: string
          cons?: string[]
          id?: string
          image_alt?: string | null
          image_url?: string | null
          is_recommended?: boolean
          model?: string
          name: string
          overall_score: number
          price_note?: string
          product_url?: string | null
          pros?: string[]
          review_content_id: string
          sort_order?: number
          specifications?: Json
          verdict_label?: string
        }
        Update: {
          brand?: string
          cons?: string[]
          id?: string
          image_alt?: string | null
          image_url?: string | null
          is_recommended?: boolean
          model?: string
          name?: string
          overall_score?: number
          price_note?: string
          product_url?: string | null
          pros?: string[]
          review_content_id?: string
          sort_order?: number
          specifications?: Json
          verdict_label?: string
        }
        Relationships: [
          {
            foreignKeyName: "review_products_review_content_id_fkey"
            columns: ["review_content_id"]
            isOneToOne: false
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
      review_profiles: {
        Row: {
          best_for: string[]
          category: string
          content_id: string
          disclosure_text: string
          disclosure_type: string
          evidence_level: string
          methodology: string
          review_type: string
          tested_on: string | null
          testing_period: string
          updated_at: string
          verdict: string
        }
        Insert: {
          best_for?: string[]
          category: string
          content_id: string
          disclosure_text?: string
          disclosure_type?: string
          evidence_level?: string
          methodology?: string
          review_type: string
          tested_on?: string | null
          testing_period?: string
          updated_at?: string
          verdict?: string
        }
        Update: {
          best_for?: string[]
          category?: string
          content_id?: string
          disclosure_text?: string
          disclosure_type?: string
          evidence_level?: string
          methodology?: string
          review_type?: string
          tested_on?: string | null
          testing_period?: string
          updated_at?: string
          verdict?: string
        }
        Relationships: [
          {
            foreignKeyName: "review_profiles_content_id_fkey"
            columns: ["content_id"]
            isOneToOne: true
            referencedRelation: "content_items"
            referencedColumns: ["id"]
          },
        ]
      }
    }
    Views: {
      [_ in never]: never
    }
    Functions: {
      admin_content_seo_audit: {
        Args: never
        Returns: {
          author_name: string
          content_id: string
          content_type: string
          days_since_update: number
          focus_keyword: string
          inbound_links: number
          issues: string[]
          public_author: boolean
          reviewer_name: string
          route: string
          search_intent: string
          seo_score: number
          slug: string
          title: string
        }[]
      }
      admin_internal_link_audit: {
        Args: never
        Returns: {
          link_status: string
          relation_type: string
          source_route: string
          source_title: string
          target_route: string
          target_title: string
        }[]
      }
      admin_keyword_cannibalization: {
        Args: never
        Returns: {
          content_count: number
          content_ids: string[]
          focus_keyword: string
          routes: string[]
          titles: string[]
        }[]
      }
      admin_launch_content_coverage: {
        Args: never
        Returns: {
          content_type: string
          coverage_status: string
          launch_target: number
          published_count: number
          remaining_count: number
        }[]
      }
      assess_frost_risk: {
        Args: {
          containerized?: boolean
          exposure?: string
          forecast_low_c?: number
          plant_tolerance?: string
        }
        Returns: {
          actions: string[]
          assumptions: string[]
          explanation: string
          risk_level: string
          risk_score: number
          tolerance_threshold_c: number
        }[]
      }
      calculate_container_size: {
        Args: {
          growth_duration?: string
          plant_count?: number
          plant_group?: string
        }
        Returns: {
          approximate_diameter_cm: number
          assumptions: string[]
          guidance: string[]
          minimum_depth_cm: number
          minimum_liters: number
          preferred_liters: number
        }[]
      }
      calculate_watering_check: {
        Args: {
          drainage?: string
          exposure?: string
          plant_need?: string
          pot_liters?: number
          temperature_band?: string
        }
        Returns: {
          assumptions: string[]
          check_interval_hours: number
          morning_check_recommended: boolean
          routine: string[]
          soil_test_depth_cm: number
          warning: string
        }[]
      }
      content_public_route: {
        Args: { content_type: string; slug: string }
        Returns: string
      }
      find_guided_problem_matches: {
        Args: {
          distribution_pattern?: string
          moisture_condition?: string
          observed_sign?: string
          result_limit?: number
        }
        Returns: {
          category: string
          content_id: string
          excerpt: string
          match_score: number
          reasons: string[]
          slug: string
          symptoms: string[]
          title: string
          urgency: string
          verification_steps: Json
          warnings: string[]
        }[]
      }
      find_suitable_plants: {
        Args: {
          requested_care?: string
          requested_climate?: string
          requested_space?: string
          requested_sun_hours?: number
          result_limit?: number
        }
        Returns: {
          body: Json
          content_id: string
          excerpt: string
          reasons: string[]
          score: number
          slug: string
          title: string
        }[]
      }
      get_monthly_growing_tasks: {
        Args: {
          requested_climate?: string
          requested_hemisphere?: string
          requested_month?: number
          requested_space?: string
          result_limit?: number
        }
        Returns: {
          activity_type: string
          calendar_climate: string
          calendar_hemisphere: string
          calendar_slug: string
          calendar_space: string
          calendar_title: string
          context_score: number
          description: string
          entry_id: string
          priority: string
          scope_note: string
          title: string
          warnings: string[]
        }[]
      }
      get_most_searched_plants: {
        Args: { result_limit?: number }
        Returns: {
          content_id: string
          last_searched_at: string
          search_count: number
          slug: string
        }[]
      }
      get_public_editorial_meta: {
        Args: { content_slug: string }
        Returns: {
          author_name: string
          author_slug: string
          published_at: string
          reviewer_name: string
          reviewer_slug: string
          updated_at: string
        }[]
      }
      guide_plant_observation: {
        Args: {
          distribution_pattern?: string
          moisture_condition?: string
          observed_sign?: string
          recent_change?: string
        }
        Returns: {
          assumptions: string[]
          attention_level: string
          avoid_actions: string[]
          category_hint: string
          observation_checks: string[]
          summary: string
        }[]
      }
      media_asset_usage: {
        Args: { p_asset_id: string }
        Returns: {
          content_id: string
          content_type: string
          slug: string
          status: Database["public"]["Enums"]["content_status"]
          title: string
          usage_location: string
        }[]
      }
      plan_small_growing_space: {
        Args: {
          access_style?: string
          depth_cm?: number
          space_type?: string
          sun_hours?: number
          width_cm?: number
        }
        Returns: {
          access_reserved_percent: number
          checks: string[]
          growing_area_m2: number
          layout_note: string
          module_width_cm: number
          priorities: string[]
          safety_note: string
          suggested_modules: number
          total_area_m2: number
        }[]
      }
      publish_due_content: { Args: never; Returns: number }
      record_plant_search_interest: {
        Args: { search_query: string }
        Returns: string
      }
      restore_content_revision: {
        Args: { target_revision_id: number }
        Returns: string
      }
      search_prefix_query: { Args: { search_query: string }; Returns: unknown }
      search_published_content: {
        Args: {
          filter_content_type?: string
          result_limit?: number
          search_query: string
        }
        Returns: {
          content_type: string
          excerpt: string
          id: string
          rank: number
          route: string
          slug: string
          title: string
          updated_at: string
        }[]
      }
      suggest_published_searches: {
        Args: { search_query?: string; suggestion_limit?: number }
        Returns: {
          content_type: string
          label: string
          query: string
          route: string
        }[]
      }
    }
    Enums: {
      content_status: "draft" | "review" | "published" | "archived"
      user_role: "admin"
    }
    CompositeTypes: {
      [_ in never]: never
    }
  }
}

type DatabaseWithoutInternals = Omit<Database, "__InternalSupabase">

type DefaultSchema = DatabaseWithoutInternals[Extract<keyof Database, "public">]

export type Tables<
  DefaultSchemaTableNameOrOptions extends
    | keyof (DefaultSchema["Tables"] & DefaultSchema["Views"])
    | { schema: keyof DatabaseWithoutInternals },
  TableName extends DefaultSchemaTableNameOrOptions extends {
    schema: keyof DatabaseWithoutInternals
  }
    ? keyof (DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"] &
        DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Views"])
    : never = never,
> = DefaultSchemaTableNameOrOptions extends {
  schema: keyof DatabaseWithoutInternals
}
  ? (DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"] &
      DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Views"])[TableName] extends {
      Row: infer R
    }
    ? R
    : never
  : DefaultSchemaTableNameOrOptions extends keyof (DefaultSchema["Tables"] &
        DefaultSchema["Views"])
    ? (DefaultSchema["Tables"] &
        DefaultSchema["Views"])[DefaultSchemaTableNameOrOptions] extends {
        Row: infer R
      }
      ? R
      : never
    : never

export type TablesInsert<
  DefaultSchemaTableNameOrOptions extends
    | keyof DefaultSchema["Tables"]
    | { schema: keyof DatabaseWithoutInternals },
  TableName extends DefaultSchemaTableNameOrOptions extends {
    schema: keyof DatabaseWithoutInternals
  }
    ? keyof DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"]
    : never = never,
> = DefaultSchemaTableNameOrOptions extends {
  schema: keyof DatabaseWithoutInternals
}
  ? DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"][TableName] extends {
      Insert: infer I
    }
    ? I
    : never
  : DefaultSchemaTableNameOrOptions extends keyof DefaultSchema["Tables"]
    ? DefaultSchema["Tables"][DefaultSchemaTableNameOrOptions] extends {
        Insert: infer I
      }
      ? I
      : never
    : never

export type TablesUpdate<
  DefaultSchemaTableNameOrOptions extends
    | keyof DefaultSchema["Tables"]
    | { schema: keyof DatabaseWithoutInternals },
  TableName extends DefaultSchemaTableNameOrOptions extends {
    schema: keyof DatabaseWithoutInternals
  }
    ? keyof DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"]
    : never = never,
> = DefaultSchemaTableNameOrOptions extends {
  schema: keyof DatabaseWithoutInternals
}
  ? DatabaseWithoutInternals[DefaultSchemaTableNameOrOptions["schema"]]["Tables"][TableName] extends {
      Update: infer U
    }
    ? U
    : never
  : DefaultSchemaTableNameOrOptions extends keyof DefaultSchema["Tables"]
    ? DefaultSchema["Tables"][DefaultSchemaTableNameOrOptions] extends {
        Update: infer U
      }
      ? U
      : never
    : never

export type Enums<
  DefaultSchemaEnumNameOrOptions extends
    | keyof DefaultSchema["Enums"]
    | { schema: keyof DatabaseWithoutInternals },
  EnumName extends DefaultSchemaEnumNameOrOptions extends {
    schema: keyof DatabaseWithoutInternals
  }
    ? keyof DatabaseWithoutInternals[DefaultSchemaEnumNameOrOptions["schema"]]["Enums"]
    : never = never,
> = DefaultSchemaEnumNameOrOptions extends {
  schema: keyof DatabaseWithoutInternals
}
  ? DatabaseWithoutInternals[DefaultSchemaEnumNameOrOptions["schema"]]["Enums"][EnumName]
  : DefaultSchemaEnumNameOrOptions extends keyof DefaultSchema["Enums"]
    ? DefaultSchema["Enums"][DefaultSchemaEnumNameOrOptions]
    : never

export type CompositeTypes<
  PublicCompositeTypeNameOrOptions extends
    | keyof DefaultSchema["CompositeTypes"]
    | { schema: keyof DatabaseWithoutInternals },
  CompositeTypeName extends PublicCompositeTypeNameOrOptions extends {
    schema: keyof DatabaseWithoutInternals
  }
    ? keyof DatabaseWithoutInternals[PublicCompositeTypeNameOrOptions["schema"]]["CompositeTypes"]
    : never = never,
> = PublicCompositeTypeNameOrOptions extends {
  schema: keyof DatabaseWithoutInternals
}
  ? DatabaseWithoutInternals[PublicCompositeTypeNameOrOptions["schema"]]["CompositeTypes"][CompositeTypeName]
  : PublicCompositeTypeNameOrOptions extends keyof DefaultSchema["CompositeTypes"]
    ? DefaultSchema["CompositeTypes"][PublicCompositeTypeNameOrOptions]
    : never

export const Constants = {
  graphql_public: {
    Enums: {},
  },
  public: {
    Enums: {
      content_status: ["draft", "review", "published", "archived"],
      user_role: ["admin"],
    },
  },
} as const

