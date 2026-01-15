# Software Development Methodology - Prototyping Model
## KICT Alumni Management System

![Prototyping Model](uploaded_image_1768408353968.png)

---

## Overview of Prototyping Model

The **Prototyping Model** is an iterative software development approach where an early version of the system (prototype) is built, tested with users, and refined based on feedback before proceeding to full development. This model is particularly effective when user requirements are unclear or when user satisfaction is a critical success factor.

### Why Prototyping Model for KICT Alumni Management System?

1. **User-Centric Development**: Alumni and administrators are the primary users, so their feedback is essential
2. **Iterative Refinement**: UI/UX design benefits from multiple iterations based on real user testing
3. **Risk Reduction**: Early detection of usability issues before extensive development
4. **Requirement Clarity**: Helps clarify vague requirements through visual prototypes
5. **Stakeholder Engagement**: Keeps stakeholders involved throughout the development process

---

## Prototyping Model Phases Applied to KICT System

### Phase 1: Initial Requirements

**Objective**: Gather and document initial system requirements from stakeholders

**Activities Performed**:
1. **Stakeholder Identification**
   - Identified two primary user types: Alumni and Administrators
   - Recognized KICT staff as secondary stakeholders

2. **Requirements Elicitation**
   - Conducted brainstorming sessions within the development team
   - Analyzed existing alumni management challenges at KICT
   - Studied similar systems at other universities for best practices

3. **Problem Analysis**
   - Identified core problem: Lack of centralized system for alumni profile management
   - Recognized need for data accuracy through approval workflows
   - Need for achievement tracking and reporting capabilities

4. **Functional Requirements Documentation**
   - Authentication module (login, register, account lockout)
   - Profile management with approval workflow
   - Achievement CRUD operations
   - Admin approval interface
   - Feedback submission system
   - Search, filter, and reporting features

**Deliverables**:
- Initial requirements list
- User stories for alumni and admin personas
- Use case identification

---

### Phase 2: Design

**Objective**: Create the initial system design based on gathered requirements

**Activities Performed**:
1. **Architecture Design**
   - Selected Laravel MVC framework for structured development
   - Designed three-tier architecture: Model, View, Controller
   - Planned database schema with entities: Users, Achievements, UpdateRequests, Feedback

2. **Database Design**
   - Created Entity-Relationship diagrams
   - Defined user table with comprehensive fields (personal, academic, professional)
   - Designed relationships: User has many Achievements, User has many UpdateRequests

3. **User Interface Design**
   - Sketched low-fidelity wireframes for key pages:
     - Login/Register pages
     - Alumni dashboard
     - Profile page with tabbed sections (Personal, Academic, Professional)
     - Admin approval interface
   - Applied IIUM branding (green and gold color scheme)
   - Planned responsive design using TailwindCSS

4. **Work Distribution**
   - Divided tasks based on Laravel architecture:
     - Controllers and Routes (Adam)
     - Models (Syaqeeb)
     - Migrations (Iqbal)
     - Views (Nazim)

**Deliverables**:
- Class diagrams
- Database schema
- UI wireframes
- System architecture documentation

---

### Phase 3: Prototyping

**Objective**: Build working prototypes of key system components

**Activities Performed**:
1. **First Prototype - Authentication Module**
   - Developed login and registration pages
   - Implemented basic authentication logic
   - Created simple dashboard redirects

2. **Second Prototype - Profile Management**
   - Built profile display page with tabbed interface
   - Created edit profile form
   - Implemented update request submission

3. **Third Prototype - Admin Interface**
   - Developed pending requests list
   - Created approval/rejection interface
   - Added request detail view

4. **Fourth Prototype - Achievement System**
   - Built achievement create/edit forms
   - Implemented file upload functionality
   - Created achievement display on profiles

5. **Technical Implementation**
   - Set up Laravel project with TailwindCSS
   - Created database migrations
   - Implemented models with relationships
   - Developed Blade templates for views
   - Built controllers with business logic

**Deliverables**:
- Functional prototypes for each module
- Working codebase on GitHub
- Local development environment (XAMPP + Laravel server)

---

### Phase 4: Users Evaluation

**Objective**: Gather feedback from actual users on prototypes

**Activities Performed**:
1. **Internal Team Review**
   - Team members tested each other's modules
   - Identified bugs and usability issues
   - Reviewed code quality and adherence to Laravel conventions

2. **Peer Testing**
   - Shared prototypes with classmates for feedback
   - Gathered opinions on UI/UX design
   - Collected suggestions for improvements

3. **Functionality Testing**
   - Tested authentication flow (including lockout mechanism)
   - Verified profile update workflow from submission to approval
   - Tested achievement creation with file uploads
   - Validated filtering and search functionality

4. **Usability Assessment**
   - Evaluated navigation intuitiveness
   - Assessed color scheme and branding alignment
   - Reviewed form validation and error messages
   - Tested responsive design on different screen sizes

**Feedback Collected**:
- "Add state filter to admin alumni list for regional analysis" → **Implemented**
- "Profile page needs better organization" → Implemented tabbed interface
- "Need to see program information in alumni list" → Added program column
- "Report generation would be useful" → Added PDF export with state filtering

**Deliverables**:
- User feedback documentation
- List of identified issues and improvements
- Prioritized enhancement backlog

---

### Phase 5: Review & Updation

**Objective**: Refine design and implementation based on user feedback

**Activities Performed**:
1. **Feedback Analysis**
   - Categorized feedback into critical, important, and nice-to-have
   - Prioritized changes based on impact and effort
   - Discussed improvements with team

2. **Design Refinement**
   - Updated UI designs to address usability concerns
   - Improved color contrast for better readability
   - Refined form layouts and validation messages

3. **Feature Enhancement**
   - Added state filter to alumni list (recent enhancement)
   - Implemented sorting functionality (A-Z, Z-A)
   - Added Clear button to reset filters
   - Enhanced admin dashboard with statistics

4. **Iterative Updates**
   - Made incremental changes to prototypes
   - Re-tested after each update
   - Pushed updates to GitHub for version control

5. **Continuous Improvement Cycle**
   - Repeated Prototyping → Evaluation → Review cycle multiple times
   - Each iteration improved system quality and user satisfaction
   - Refined until stakeholder satisfaction achieved

**Decision Point**: When team and testers were satisfied with functionality and usability, proceeded to full development phase

**Deliverables**:
- Refined prototypes incorporating feedback
- Updated design documentation
- Enhanced codebase ready for final development

---

### Phase 6: Development

**Objective**: Build the complete, production-ready system

**Activities Performed**:
1. **Full Feature Implementation**
   - Completed all planned modules:
     - ✅ Authentication with account lockout (3 attempts = 15 min lockout)
     - ✅ Profile management with approval workflow
     - ✅ Achievement CRUD with file uploads (PDF, images)
     - ✅ Admin approval interface
     - ✅ Feedback system with ratings
     - ✅ Alumni list with search, filter (program, state), and sort
     - ✅ PDF report generation filtered by state

2. **Database Finalization**
   - Created all migrations:
     - Users table with personal, academic, professional fields
     - Achievements table with category and file paths
     - Update requests table with profile_data JSON and status
     - Feedback table with user association and ratings
   - Seeded database with sample alumni data

3. **Security Implementation**
   - Password hashing with bcrypt
   - CSRF protection on all forms
   - Session management
   - Role-based access control (Alumni vs Admin)
   - Input validation on client and server side

4. **UI Polish**
   - Applied consistent IIUM branding across all pages
   - Ensured responsive design for desktop and tablet
   - Added loading states and success/error messages
   - Implemented smooth transitions and hover effects

5. **Code Quality**
   - Followed Laravel coding conventions
   - Organized code using MVC pattern
   - Used GitHub for version control
   - Added comments for complex logic

**Deliverables**:
- Complete, functional KICT Alumni Management System
- All database migrations and seeders
- Comprehensive codebase pushed to GitHub
- Deployment-ready application

---

### Phase 7: Test

**Objective**: Verify system functionality, reliability, and quality

**Activities Performed**:
1. **Functional Testing**
   - **Authentication Module**:
     - ✅ User registration with validation
     - ✅ Login with correct credentials
     - ✅ Account lockout after 3 failed attempts
     - ✅ Lockout timer countdown (15 minutes)
     - ✅ Role-based dashboard redirection
   
   - **Profile Management**:
     - ✅ View profile with tabbed sections
     - ✅ Edit profile and submit update request
     - ✅ Request stored as "pending"
     - ✅ Profile not updated until approved
   
   - **Achievement System**:
     - ✅ Create achievement with title, date, description
     - ✅ Upload supporting files (PDF, images)
     - ✅ Edit own achievements
     - ✅ Delete own achievements
   
   - **Admin Module**:
     - ✅ View pending update requests
     - ✅ Review request details
     - ✅ Approve request (profile updated)
     - ✅ Reject request with reason
   
   - **Alumni List & Filtering**:
     - ✅ Search by name or student ID
     - ✅ Filter by program (BCS/BIT)
     - ✅ Filter by state (all Malaysian states)
     - ✅ Sort alphabetically (A-Z, Z-A)
     - ✅ Combined filters work correctly
     - ✅ Clear button resets all filters
   
   - **Report Generation**:
     - ✅ Generate PDF for all alumni
     - ✅ Generate PDF filtered by state
     - ✅ Download PDF with correct filename

2. **Validation Testing**
   - ✅ Required field validation
   - ✅ Email format validation
   - ✅ Password strength requirements
   - ✅ File type restrictions (PDF, JPG, PNG)
   - ✅ Date format validation

3. **Boundary Testing**
   - Tested with maximum field lengths
   - Tested with special characters in inputs
   - Tested with empty submissions
   - Tested file upload size limits

4. **Negative Testing**
   - Attempted SQL injection → Blocked by Laravel
   - Attempted CSRF attacks → Blocked by token validation
   - Attempted unauthorized access → Redirected to login
   - Attempted to approve non-pending requests → Error handling works

5. **User Acceptance Testing**
   - Demonstrated system to course instructor (stakeholder)
   - Validated against project requirements
   - Confirmed all use cases are satisfied

**Test Cases Documented**:
- Test Case 1: User Authentication (Login Success/Failure/Lockout)
- Test Case 2: Profile Update Request Submission
- Test Case 3: Admin Approval Workflow
- Test Case 4: Achievement Management (Create/Edit/Delete)
- Test Case 5: Search and Filter Functionality
- Test Case 6: Report Generation

**Deliverables**:
- Test case documentation
- Bug reports and resolutions
- Test results confirming system readiness

---

### Phase 8: Maintain

**Objective**: Provide ongoing support and enhancements

**Activities Performed**:
1. **Version Control**
   - Maintained GitHub repository with commit history
   - Tagged releases for milestones
   - Documented changes in commit messages

2. **Bug Fixes**
   - Monitored system for any issues
   - Fixed reported bugs promptly
   - Pushed fixes to GitHub

3. **Enhancements**
   - Added state filter based on continued feedback
   - Improved UI based on usability findings
   - Optimized database queries for performance

4. **Documentation**
   - Created comprehensive project document
   - Maintained README.md with setup instructions
   - Documented test cases
   - Created walkthrough guides

5. **Future Maintenance Plan**
   - Regular security updates (Laravel framework updates)
   - Database backups
   - Performance monitoring
   - User feedback collection for future improvements

**Deliverables**:
- Maintained codebase on GitHub
- Project documentation
- User guides and walkthroughs

---

## Prototyping Model Benefits Realized

### 1. **User Satisfaction**
- Alumni and admin feedback incorporated throughout development
- Final system meets actual user needs, not assumed requirements
- Intuitive interface from multiple design iterations

### 2. **Reduced Development Risk**
- Early prototypes identified usability issues before major coding
- Prevented costly rework in later stages
- Validated technical feasibility early

### 3. **Improved Communication**
- Visual prototypes facilitated better discussion with stakeholders
- Team members aligned on system vision
- Clear understanding of requirements

### 4. **Flexibility to Change**
- Easy to incorporate feedback during prototyping phase
- Iterative nature allowed continuous refinement
- Responsive to changing requirements

### 5. **Quality Assurance**
- Testing happened continuously throughout development
- Issues caught and fixed early
- Final product more stable and reliable

---

## Iterations Performed

### Iteration 1: Basic Authentication
- **Prototype**: Simple login/register
- **Feedback**: "Need account lockout for security"
- **Update**: Added 3-attempt lockout with 15-minute timer

### Iteration 2: Profile Management
- **Prototype**: Basic profile edit form
- **Feedback**: "Too many fields on one page, confusing"
- **Update**: Implemented tabbed interface (Personal, Academic, Professional)

### Iteration 3: Admin Interface
- **Prototype**: Simple approval list
- **Feedback**: "Need to see what changed before approving"
- **Update**: Added detailed view showing proposed changes

### Iteration 4: Alumni List
- **Prototype**: Basic table with all alumni
- **Feedback**: "Need to filter by state and program for regional events"
- **Update**: Added search, filter by program, filter by state, sorting

### Iteration 5: Reporting
- **Prototype**: No reporting initially
- **Feedback**: "Need to export data for analysis"
- **Update**: Added PDF generation with state filtering

---

## Conclusion

The **Prototyping Model** proved to be the ideal methodology for the KICT Alumni Management System project. Through multiple iterations of prototyping, user evaluation, and refinement, the team was able to build a system that truly meets the needs of KICT administrators and alumni. 

The iterative nature allowed for:
- ✅ Continuous user feedback integration
- ✅ Early identification and resolution of issues
- ✅ Reduced risk of building wrong features
- ✅ High user satisfaction with final product
- ✅ Quality assurance throughout development

The final system successfully addresses all identified problems with comprehensive features for profile management, achievement tracking, admin oversight, and data reporting - all validated through real user testing during the prototyping phase.
