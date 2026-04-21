Title: Loong Cakes 

A full-stack recipe platform built with Laravel MVC, focused on community engagement and moderated content.

-Technical Implementation

Framework: Laravel (PHP)

Database: MySQL (Relational ERD)

Templating: Blade Engine

Auth: Laravel Breeze / Custom Auth Logic

-Development Journey

Phase 1: Foundation. Learned the MVC architecture through Laracasts and implemented dynamic navigation and layouts.

Phase 2: Core CRUD. Developed the full Create, Read, Update, and Delete lifecycle for recipes, including category management and image handling.

Phase 3: Community & Security. Integrated a robust comment system and established a "Contribution Threshold" logic to gatekeep uploading rights.

-Key Learning Moments

Database Refactoring: Learned the importance of a solid ERD after realizing a single column for ingredients wasn't sufficient for complex filtering.

Admin Workflow: Implemented state management for recipes (Active vs. Inactive) to give administrators full control over public content.
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Project Development Log (Changelog)

Phase 1: Foundation & MVC Architecture
Oct 15: Initialized project repository. Established core database schema and migrations. Implemented dynamic navigation and layout using Blade templating (Mastered MVC patterns via Laracasts).

Oct 16: Refined navigation UI/UX styling for better consistency.

Phase 2: Search & Authentication
Oct 20: Developed global search functionality for the navigation bar. Integrated and styled Laravel’s authentication system for User Login and Registration pages.

Oct 21: Built the Recipe creation interface. Defined the store logic within the RecipeController to handle incoming data.

Oct 22: Optimized the Recipe Model and Controller relationships to ensure data persistence during recipe creation.

Phase 3: Structural Refactoring
Oct 27: Major Pivot: Refactored the database architecture. Removed the static "Ingredients" column in favor of a relational structure to allow for better data manipulation. Effectively rebuilt the core project logic to ensure high code quality.

Oct 28: Finalized the new navigation bar. Designed and implemented "Recipe Cards" for the gallery view. Custom-styled the dashboard and login pages to align with the unique "Loong Cakes" brand identity.

Phase 4: Features & Functional Logic
Oct 29: Resolved data binding issues during recipe creation; specifically addressed category assignment bugs.

Oct 31: Finalized the category selection logic. Launched the home page redesign and began work on the advanced filtering system.

Nov 1: Successfully implemented the recipe filtering engine. Added full CRUD capabilities, including the ability for users to delete their own recipes.

Phase 5: Moderation & Engagement Gating
Nov 2: Final Integration: * Implemented Recipe Editing functionality.

Developed an Admin Moderation Toggle (Active/Inactive status) to control public visibility.

Engineered a Contribution Threshold: Created a full comment system. Integrated logic that requires users to post at least 5 comments before unlocking the ability to upload their own recipes.

Synchronized the local repository with the remote GitHub origin for final deployment.
