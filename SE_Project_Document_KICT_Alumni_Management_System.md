# KULLIYYAH OF INFORMATION & COMMUNICATION TECHNOLOGY

## SEMESTER 1, 2025/2026

### BICS 2306 SOFTWARE ENGINEERING
**SECTION 3**

---

# KICT Alumni Management System

## GROUP <x>

---

### PREPARED BY:

| NAME | MATRIC NO. | PARTICIPATION |
|------|------------|---------------|
| AHMAD ADAM HAKIMI BIN NAEMAN | 2418711 | 100% |
| MUHAMMAD IQBAL BIN SOFIAN | 2412641 | 100% |
| AHMAD SYAQEEB BIN SUHAIMI | 2413645 | 100% |
| NAZIM BIN AZMAN | 2418747 | 100% |

---

### LECTURER
**DR. AZLIN BINTI NORDIN**

### DUE
**<Check based on course schedule>**

---

## Table of Contents

1. [Introduction](#1-introduction)
   - 1.1 [Document Purpose](#11-document-purpose)
   - 1.2 [Project Scope](#12-project-scope)
   - 1.3 [Intended Audience and Document Overview](#13-intended-audience-and-document-overview)
   - 1.4 [Definitions, Acronyms and Abbreviations](#14-definitions-acronyms-and-abbreviations)
   - 1.5 [References and Acknowledgments](#15-references-and-acknowledgments)
2. [Overall Description](#2-overall-description)
   - 2.1 [Project Perspective](#21-project-perspective)
   - 2.2 [System Functionality](#22-system-functionality)
   - 2.3 [Users and Characteristics](#23-users-and-characteristics)
   - 2.4 [Design and Implementation Constraints](#24-design-and-implementation-constraints)
   - 2.5 [Assumptions and Dependencies](#25-assumptions-and-dependencies)
3. [Software Process](#3-software-process)
   - 3.1 [Software Process Model](#31-software-process-model)
4. [Requirements Phase](#4-requirements-phase)
   - 4.1 [Requirements Engineering Activities](#41-requirements-engineering-activities)
   - 4.2 [Scope Definition and Problem Analysis](#42-scope-definition-and-problem-analysis)
   - 4.3 [Requirements Analysis](#43-requirements-analysis)
5. [Design Phase](#5-design-phase)
   - 5.1 [Design Activities](#51-design-activities)
6. [Implementation Phase](#6-implementation-phase)
   - 6.1 [Implementation Activities](#61-implementation-activities)
7. [Testing Phase](#7-testing-phase)
   - 7.1 [Testing Activities](#71-testing-activities)
8. [Lesson Learned](#8-lesson-learned)
   - 8.1 [Team Collaboration and Communication](#81-team-collaboration-and-communication)
   - 8.2 [Technical Skills Development](#82-technical-skills-development)
   - 8.3 [Project Management and Time Allocation](#83-project-management-and-time-allocation)
9. [References](#references)

---

## 1 Introduction

The KICT Alumni Management System is a comprehensive web-based application designed to facilitate the management of alumni data and profiles for the Kulliyyah of Information and Communication Technology (KICT) at International Islamic University Malaysia (IIUM). This document provides a detailed overview of the project, including its requirements, design, implementation, and testing phases.

### 1.1 Document Purpose

This document serves as the Software Requirements Specification (SRS) and project documentation for the KICT Alumni Management System. It aims to:

1. Provide a comprehensive description of the system's functionality, features, and constraints
2. Document the software development process followed during the project lifecycle
3. Serve as a reference for stakeholders including developers, testers, administrators, and the course instructor
4. Outline the requirements engineering, design, implementation, and testing activities undertaken

### 1.2 Project Scope

The KICT Alumni Management System is a web application developed to streamline alumni profile management and administrative oversight. The system provides the following key benefits:

1. **Centralized Alumni Database**: Maintains comprehensive records of alumni including personal, academic, and professional information
2. **Profile Management with Approval Workflow**: Allows alumni to update their profiles with changes requiring administrative approval, ensuring data accuracy
3. **Achievement Tracking**: Enables alumni to record and showcase their professional achievements and milestones
4. **Administrative Control**: Provides administrators with tools to review, approve, or reject profile update requests
5. **Secure Authentication**: Implements robust authentication with account lockout protection against brute-force attacks
6. **Feedback System**: Allows alumni to submit feedback to improve the system and alumni services

### 1.3 Intended Audience and Document Overview

This document is intended for the following audiences:

1. **Course Instructor (Dr. Azlin Binti Nordin)**: For evaluation of the project deliverables
2. **Project Team Members**: As a reference document for development and maintenance
3. **System Administrators**: For understanding system capabilities and management functions
4. **Future Developers**: For system maintenance and potential enhancements

**Document Structure:**
- **Section 1**: Provides an introduction and overview of the document
- **Section 2**: Describes the overall system perspective, functionality, and constraints
- **Section 3**: Documents the software process model adopted
- **Section 4**: Details the requirements engineering activities
- **Section 5**: Covers the design phase and architectural decisions
- **Section 6**: Describes the implementation activities
- **Section 7**: Outlines the testing activities and test cases
- **Section 8**: Reflects on lessons learned throughout the project

### 1.4 Definitions, Acronyms and Abbreviations

| Term | Definition |
|------|------------|
| **Alumni** | A graduate of KICT who uses the system to manage their profile |
| **Admin** | System administrator who approves/rejects profile update requests |
| **CRUD** | Create, Read, Update, Delete - basic database operations |
| **IIUM** | International Islamic University Malaysia |
| **KICT** | Kulliyyah of Information and Communication Technology |
| **Laravel** | PHP web application framework used for development |
| **MVC** | Model-View-Controller architectural pattern |
| **SRS** | Software Requirements Specification |
| **TailwindCSS** | Utility-first CSS framework used for styling |
| **UI** | User Interface |
| **Update Request** | A pending profile change submitted by alumni for admin approval |

### 1.5 References and Acknowledgments

1. Laravel Documentation - https://laravel.com/docs/
2. TailwindCSS Documentation - https://tailwindcss.com/docs/
3. IIUM Official Website - https://www.iium.edu.my/
4. Software Engineering Course Materials (BICS 2306)
5. MySQL Database Documentation - https://dev.mysql.com/doc/

---

## 2 Overall Description

### 2.1 Project Perspective

The KICT Alumni Management System is a new, self-contained web application designed to address the need for efficient alumni data management within KICT, IIUM. Previously, alumni information may have been managed through manual processes or fragmented systems. This system provides a centralized, digital solution for alumni profile management with an approval workflow to ensure data integrity.

**System Context Diagram:**

```
┌─────────────────────────────────────────────────────────────────────┐
│                        KICT Alumni Management System                 │
├─────────────────────────────────────────────────────────────────────┤
│                                                                      │
│  ┌──────────┐          ┌─────────────────┐         ┌──────────┐    │
│  │          │          │                 │         │          │    │
│  │  Alumni  │◄────────►│   Web Server    │◄───────►│  Admin   │    │
│  │  (User)  │          │   (Laravel)     │         │  (User)  │    │
│  │          │          │                 │         │          │    │
│  └──────────┘          └────────┬────────┘         └──────────┘    │
│                                 │                                   │
│                                 ▼                                   │
│                        ┌─────────────────┐                         │
│                        │                 │                         │
│                        │  MySQL Database │                         │
│                        │                 │                         │
│                        └─────────────────┘                         │
│                                                                      │
│  Components:                                                         │
│  • Authentication Module (Login/Register/Logout)                     │
│  • Profile Management Module                                         │
│  • Achievement Management Module                                     │
│  • Admin Approval Module                                            │
│  • Feedback Module                                                   │
│                                                                      │
└─────────────────────────────────────────────────────────────────────┘
```

### 2.2 System Functionality

The KICT Alumni Management System provides the following major functional requirements:

**Authentication Module:**
- FR-01: The system shall allow users to register with name, student ID, email, and password
- FR-02: The system shall authenticate users using email and password credentials
- FR-03: The system shall lock accounts for 15 minutes after 3 failed login attempts
- FR-04: The system shall redirect users to role-appropriate dashboards after login

**Profile Management Module:**
- FR-05: The system shall display alumni profiles with personal, academic, and professional information
- FR-06: The system shall allow alumni to submit profile update requests
- FR-07: The system shall store update requests as pending until admin approval
- FR-08: The system shall validate email format and required fields during profile updates

**Achievement Management Module:**
- FR-09: The system shall allow alumni to create achievements with title, date, description, and files
- FR-10: The system shall allow alumni to edit and delete their own achievements
- FR-11: The system shall support PDF documents and images as achievement attachments

**Admin Management Module:**
- FR-12: The system shall display pending update requests to administrators
- FR-13: The system shall allow administrators to approve update requests
- FR-14: The system shall allow administrators to reject update requests with a reason
- FR-15: The system shall apply approved profile changes to user accounts

**Feedback Module:**
- FR-16: The system shall allow alumni to submit feedback messages
- FR-17: The system shall store feedback with user association

### 2.3 Users and Characteristics

The system identifies two primary user types:

**1. Alumni (Primary User)**
- **Description**: KICT graduates who have registered in the system
- **Frequency of Use**: Periodic (when updating profile or adding achievements)
- **Technical Expertise**: Basic computer literacy
- **Functions Used**: Registration, login, profile viewing/editing, achievement management, feedback submission
- **Priority**: High - The system is primarily designed for alumni use

**2. Administrator (Secondary User)**
- **Description**: KICT staff responsible for verifying and approving alumni data updates
- **Frequency of Use**: Regular (daily/weekly for reviewing requests)
- **Technical Expertise**: Moderate technical skills
- **Functions Used**: Login, review pending requests, approve/reject requests
- **Security Level**: Elevated privileges for data approval
- **Priority**: High - Essential for maintaining data quality

### 2.4 Design and Implementation Constraints

The following constraints were identified during the development:

1. **Technology Stack Constraints**:
   - Must use PHP 8.x with Laravel framework for backend development
   - Must use MySQL/MariaDB for database management
   - Must use TailwindCSS for responsive frontend design

2. **Security Constraints**:
   - Password must be hashed using bcrypt
   - Session management with CSRF protection
   - Account lockout mechanism for failed login attempts

3. **Data Integrity Constraints**:
   - Profile updates require admin approval before being applied
   - Unique constraint on email and student ID fields
   - Required field validation on critical user data

4. **Interface Constraints**:
   - Must be responsive and accessible on desktop browsers
   - Must follow IIUM branding guidelines (green and gold color scheme)

### 2.5 Assumptions and Dependencies

**Assumptions:**
1. Users have access to a web browser and stable internet connection
2. Alumni have valid IIUM email addresses or personal emails
3. Administrators will review pending requests within a reasonable timeframe
4. The system will be deployed on a server with PHP 8.x and MySQL support
5. Maximum concurrent users will not exceed 100 at any given time

**Dependencies:**
1. **Laravel Framework**: Core application framework
2. **Composer**: PHP dependency management
3. **Node.js/NPM**: For frontend asset compilation (TailwindCSS)
4. **MySQL Database**: Data persistence
5. **Web Server**: Apache/Nginx for hosting

---

## 3 Software Process

### 3.1 Software Process Model

For this project, we adopted the **Prototyping Software Process Model** (Sommerville, 2016). This model helps us ensure the users get their real satisfaction while using the product. The Prototyping Model is a process for developing an early version of the software which is then shared with users to gain their feedback, allowing us to polish the product functionality to satisfy users.

**Why Prototyping Model?**

1. **User Satisfaction**: By creating prototypes early, we could gather user feedback before full implementation
2. **Iterative Improvement**: Feedback obtained from prototyping stages gave us clearer insight in the coding process
3. **Reduced Risk**: Early detection of usability issues before significant development investment
4. **Continuous Refinement**: Testing activities were conducted iteratively to validate system functionality

**Prototyping Model Process:**

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                         PROTOTYPING MODEL                                    │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                              │
│                            ┌─────────────────┐                              │
│                            │   Prototyping   │                              │
│                            └────────┬────────┘                              │
│                                     │                                        │
│   ┌──────────────────┐              ▼              ┌──────────────────┐     │
│   │    Initial       │         ┌────────┐         │ Users Evaluation │     │
│   │   Requirements   │────────►│ Design │────────►│                  │     │
│   └──────────────────┘         └────┬───┘         └────────┬─────────┘     │
│                                     │                       │                │
│                                     │                       │                │
│                                     ▼                       │                │
│                            ┌─────────────────┐              │                │
│                            │    Review &     │◄─────────────┘                │
│                            │    Updation     │                               │
│                            └────────┬────────┘                               │
│                                     │                                        │
│         ┌───────────────────────────┼──────────────────────────┐            │
│         │                           │                          │            │
│         │                           │ Customer Satisfied       │            │
│         │                           ▼                          │            │
│   ┌─────┴─────┐              ┌────────────┐             ┌─────┴─────┐      │
│   │ Maintain  │◄─────────────│    Test    │◄────────────│Development│      │
│   └───────────┘              └────────────┘             └───────────┘      │
│                                                                              │
└─────────────────────────────────────────────────────────────────────────────┘
```

### 3.2 Activities Involved

**Task Distribution Based on Laravel Architecture:**

We distributed our works based on the architecture of Laravel Framework. Each task was divided per person, with the following distribution:

| Name | Matric Number | Task |
|------|---------------|------|
| Ahmad Adam Hakimi bin Naeman | 2418711 | Controller and Route |
| Ahmad Syaqeeb bin Suhaimi | 2413645 | Models |
| Muhammad Iqbal bin Sofian | 2412641 | Migrations |
| Nazim bin Azman | 2418747 | Views |

**Development Workflow:**

Using the prototyping model, we solved problems one by one. For each functionality:

1. **Reference Class Diagram**: We first identified the Alumni Attributes by referring to our class diagram
2. **UI Design Reference**: We referred to the User Interface design to understand required functionality (Update Button, Forms, etc.)
3. **Implementation Process**: We proceeded to coding implementation to build the real functionality
4. **Version Control**: We used GitHub for remote workflow collaboration
5. **Database Development**: Started by developing the database on XAMPP MySQL
6. **Model Creation**: Created the Models inside the project file
7. **Controller Development**: Built Controllers to bond the relationship with networks and routes

**MVC (Model-View-Controller) Implementation:**

- **M - Models**: Defined data architecture through Migrations and Models for accurate data handling
- **V - Views**: Developed user-facing interfaces based on pre-defined UI designs
- **C - Controllers**: Created the connection between user requests and system data

**Activities Executed:**

1. **Initial Requirements Phase**:
   - Gathered requirements through interviews with KICT alumni
   - Conducted observation of existing IIUM Alumni Portal
   - Compared with other university alumni systems

2. **Design Phase**:
   - Created low-fidelity prototypes (sketches and wireframes)
   - Built high-fidelity digital prototypes using Figma/Canva
   - Gathered feedback from peers on usability and layout

3. **Development Phase**:
   - Implemented authentication with lockout protection
   - Built profile management with approval workflow
   - Created achievement CRUD operations with file upload
   - Developed admin approval interface

4. **Testing Phase**:
   - Conducted functional testing on all modules
   - Performed input validation testing
   - Executed boundary value and negative testing

---

## 4 Requirements Phase

### 4.1 Requirements Engineering Activities

The requirements engineering process involved the following activities:

1. **Stakeholder Identification**: Identified alumni and administrators as primary stakeholders
2. **Requirements Elicitation**: Gathered requirements through brainstorming and analysis of similar systems
3. **Requirements Documentation**: Captured functional and non-functional requirements
4. **Requirements Validation**: Verified requirements with team members and course objectives
5. **Use Case Modeling**: Developed use case diagrams and specifications

### 4.2 Scope Definition and Problem Analysis

**Problem Statement:**
KICT needs a centralized system to manage alumni information effectively. The current challenges include:
- Lack of a unified database for alumni profiles
- No mechanism for alumni to update their own information
- Need for administrative oversight to ensure data accuracy
- Requirement for tracking alumni achievements and professional growth

**Solution:**
The KICT Alumni Management System addresses these problems by:
- Providing a web-based platform for alumni to register and manage profiles
- Implementing an approval workflow for profile changes
- Enabling achievement tracking and documentation
- Offering administrative tools for data verification

### 4.3 Requirements Analysis

#### 4.3.1 Requirements Discovery Strategy

The following requirements discovery activities were executed:

1. **Brainstorming Sessions**: Team discussions to identify core features
2. **Document Analysis**: Reviewed existing alumni management processes
3. **Comparison with Existing Systems**: Analyzed similar alumni management platforms for best practices
4. **User Story Development**: Created user stories for each user type

#### 4.3.2 Functional Requirements

**Authentication Module:**
| ID | Requirement | Priority |
|----|-------------|----------|
| FR-01 | User registration with validation | High |
| FR-02 | User login with email/password | High |
| FR-03 | Account lockout after failed attempts | High |
| FR-04 | Role-based dashboard redirection | High |
| FR-05 | User logout functionality | High |

**Profile Management Module:**
| ID | Requirement | Priority |
|----|-------------|----------|
| FR-06 | View profile with tabbed sections | High |
| FR-07 | Edit profile with form validation | High |
| FR-08 | Submit profile update request | High |
| FR-09 | View update request status | Medium |

**Achievement Module:**
| ID | Requirement | Priority |
|----|-------------|----------|
| FR-10 | Create achievement entries | High |
| FR-11 | Upload supporting documents/images | Medium |
| FR-12 | Edit own achievements | High |
| FR-13 | Delete own achievements | High |

**Admin Module:**
| ID | Requirement | Priority |
|----|-------------|----------|
| FR-14 | View pending update requests | High |
| FR-15 | Approve update requests | High |
| FR-16 | Reject requests with reason | High |
| FR-17 | View request details | Medium |

**Feedback Module:**
| ID | Requirement | Priority |
|----|-------------|----------|
| FR-18 | Submit feedback message | Medium |
| FR-19 | View feedback count | Low |

#### 4.3.3 Use Case Diagram

```
                    ┌─────────────────────────────────────────────────────────┐
                    │         KICT Alumni Management System                    │
                    │                                                          │
                    │   ┌──────────────────┐    ┌──────────────────┐          │
                    │   │   Register       │    │ Manage Profiles  │          │
                    │   │   Account        │    │                  │          │
                    │   └────────┬─────────┘    └────────┬─────────┘          │
                    │            │                       │                     │
                    │   ┌────────┴─────────┐    ┌────────┴─────────┐          │
  ┌─────────┐       │   │   Login         │    │ Submit Update    │          │
  │         │       │   │                 │    │ Request          │          │
  │  Alumni │───────┼───┤                 │    │                  │          │
  │         │       │   └─────────────────┘    └──────────────────┘          │
  └─────────┘       │                                                         │
                    │   ┌─────────────────┐    ┌──────────────────┐          │
                    │   │ Manage          │    │ Submit           │          │
                    │   │ Achievements    │    │ Feedback         │          │
                    │   └─────────────────┘    └──────────────────┘          │
                    │                                                         │
                    │   ┌─────────────────┐    ┌──────────────────┐          │
  ┌─────────┐       │   │ View Pending    │    │ Approve/Reject   │          │
  │         │       │   │ Requests        │    │ Requests         │          │
  │  Admin  │───────┼───┤                 │    │                  │          │
  │         │       │   └─────────────────┘    └──────────────────┘          │
  └─────────┘       │                                                         │
                    └─────────────────────────────────────────────────────────┘
```

#### 4.3.4 Use Case Specification for User Authentication

| Field | Description |
|-------|-------------|
| **Use Case ID** | UC-01 |
| **Use Case Name** | User Authentication |
| **Actor** | Alumni, Admin |
| **Description** | Users authenticate to access the system |
| **Preconditions** | User has a registered account |
| **Postconditions** | User is logged in and redirected to dashboard |
| **Normal Flow** | 1. User navigates to login page<br>2. User enters email and password<br>3. System validates credentials<br>4. System redirects to appropriate dashboard |
| **Alternative Flow** | 3a. Invalid credentials - display error message |
| **Exception Flow** | 3b. Account locked - display lockout message with remaining time |

#### 4.3.5 Use Case Specification for Update Alumni Profile

| Field | Description |
|-------|-------------|
| **Use Case ID** | UC-02 |
| **Use Case Name** | Update Alumni Profile |
| **Actor** | Alumni |
| **Description** | Alumni updates their profile information |
| **Preconditions** | Alumni is logged into the system |
| **Postconditions** | Update request is created with pending status |
| **Normal Flow** | 1. Alumni navigates to profile page<br>2. Alumni clicks "Edit Profile"<br>3. Alumni modifies profile fields<br>4. Alumni submits the form<br>5. System creates update request<br>6. System displays success message |
| **Alternative Flow** | 4a. Validation error - display error messages |

#### 4.3.6 Use Case Specification for Manage Achievements

| Field | Description |
|-------|-------------|
| **Use Case ID** | UC-03 |
| **Use Case Name** | Manage Achievements |
| **Actor** | Alumni |
| **Description** | Alumni manages their achievement records |
| **Preconditions** | Alumni is logged into the system |
| **Postconditions** | Achievement is created/updated/deleted |
| **Normal Flow (Create)** | 1. Alumni clicks "Add Achievement"<br>2. Alumni fills in title, date, description<br>3. Alumni optionally uploads file/image<br>4. Alumni submits the form<br>5. System saves achievement |
| **Alternative Flow (Edit)** | 1. Alumni clicks "Edit" on achievement<br>2-5. Same as create |
| **Alternative Flow (Delete)** | 1. Alumni clicks "Delete"<br>2. System confirms deletion<br>3. System removes achievement |

#### 4.3.7 Use Case Specification for Admin Approval

| Field | Description |
|-------|-------------|
| **Use Case ID** | UC-04 |
| **Use Case Name** | Admin Approval Management |
| **Actor** | Admin |
| **Description** | Admin reviews and processes update requests |
| **Preconditions** | Admin is logged into the system, pending requests exist |
| **Postconditions** | Request status is updated to approved/rejected |
| **Normal Flow (Approve)** | 1. Admin views pending requests list<br>2. Admin clicks "View" on a request<br>3. Admin reviews proposed changes<br>4. Admin clicks "Approve"<br>5. System updates request status and applies changes |
| **Alternative Flow (Reject)** | 4. Admin enters rejection reason<br>5. Admin clicks "Reject"<br>6. System updates status with reason |

#### 4.3.8 Use Case Specification for Submit Feedback

| Field | Description |
|-------|-------------|
| **Use Case ID** | UC-05 |
| **Use Case Name** | Submit Feedback |
| **Actor** | Alumni |
| **Description** | Alumni submits feedback to administrators |
| **Preconditions** | Alumni is logged into the system |
| **Postconditions** | Feedback is stored in the database |
| **Normal Flow** | 1. Alumni navigates to feedback page<br>2. Alumni enters feedback message<br>3. Alumni submits form<br>4. System saves feedback<br>5. System displays confirmation |
| **Alternative Flow** | 3a. Empty message - display validation error |

#### 4.3.9 Activity Diagram - Profile Update Approval Workflow

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                     Profile Update Approval Workflow                         │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                              │
│           Alumni                                    Admin                    │
│             │                                         │                      │
│             ▼                                         │                      │
│    ┌─────────────────┐                               │                      │
│    │ View Profile    │                               │                      │
│    └────────┬────────┘                               │                      │
│             │                                         │                      │
│             ▼                                         │                      │
│    ┌─────────────────┐                               │                      │
│    │ Click Edit      │                               │                      │
│    │ Profile         │                               │                      │
│    └────────┬────────┘                               │                      │
│             │                                         │                      │
│             ▼                                         │                      │
│    ┌─────────────────┐                               │                      │
│    │ Modify Fields   │                               │                      │
│    └────────┬────────┘                               │                      │
│             │                                         │                      │
│             ▼                                         │                      │
│    ┌─────────────────┐                               │                      │
│    │ Submit Update   │                               │                      │
│    │ Request         │                               │                      │
│    └────────┬────────┘                               │                      │
│             │                                         │                      │
│             ▼                                         │                      │
│    ┌─────────────────┐                               │                      │
│    │ Request Created │                               │                      │
│    │ (Pending)       │───────────────────────────────►│                      │
│    └─────────────────┘                               │                      │
│                                          ┌───────────▼───────────┐          │
│                                          │ Review Pending        │          │
│                                          │ Request               │          │
│                                          └───────────┬───────────┘          │
│                                                      │                       │
│                                                      ▼                       │
│                                          ┌─────────────────────┐            │
│                                          │ Decision:           │            │
│                                          │ Approve or Reject?  │            │
│                                          └──────────┬──────────┘            │
│                                                     │                        │
│                              ┌──────────────────────┼──────────────────────┐│
│                              │ Approve              │ Reject               ││
│                              ▼                      ▼                      ││
│                  ┌───────────────────┐  ┌─────────────────────┐           ││
│                  │ Apply Changes to  │  │ Record Rejection    │           ││
│                  │ Profile           │  │ Reason              │           ││
│                  └─────────┬─────────┘  └──────────┬──────────┘           ││
│                            │                       │                       ││
│                            ▼                       ▼                       ││
│◄───────────────────────────────────────────────────────────────────────────┘│
│  ┌─────────────────┐                   ┌─────────────────┐                  │
│  │ Profile Updated │                   │ Request Rejected │                  │
│  │ Successfully    │                   │ with Reason      │                  │
│  └─────────────────┘                   └─────────────────┘                  │
│                                                                              │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

## 5 Design Phase

### 5.1 Design Activities

The design phase encompassed the following activities:

1. **Architecture Design**: Defined the MVC architecture using Laravel framework
2. **Database Design**: Created entity-relationship model and database schema
3. **User Interface Design**: Designed responsive layouts using TailwindCSS
4. **Component Design**: Identified and designed reusable components

#### 5.1.1 Architecture Design

The system follows the Model-View-Controller (MVC) architectural pattern provided by Laravel:

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                        MVC Architecture                                      │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                              │
│  ┌────────────────────┐                                                     │
│  │      Browser       │                                                     │
│  │    (Client Side)   │                                                     │
│  └─────────┬──────────┘                                                     │
│            │ HTTP Request                                                   │
│            ▼                                                                 │
│  ┌────────────────────┐                                                     │
│  │      Routes        │  routes/web.php                                     │
│  │   (URL Mapping)    │                                                     │
│  └─────────┬──────────┘                                                     │
│            │                                                                 │
│            ▼                                                                 │
│  ┌────────────────────┐         ┌────────────────────┐                     │
│  │    Controllers     │         │      Models        │                     │
│  │                    │◄───────►│                    │                     │
│  │ • AuthController   │         │ • User             │                     │
│  │ • ProfileController│         │ • Achievement      │                     │
│  │ • AlumniController │         │ • UpdateRequest    │                     │
│  │ • AdminController  │         │ • Feedback         │                     │
│  │ • Achievement...   │         │                    │                     │
│  │ • FeedbackController│        └─────────┬──────────┘                     │
│  └─────────┬──────────┘                   │                                 │
│            │                              │                                  │
│            ▼                              ▼                                  │
│  ┌────────────────────┐         ┌────────────────────┐                     │
│  │       Views        │         │     Database       │                     │
│  │   (Blade Templates)│         │      (MySQL)       │                     │
│  │                    │         │                    │                     │
│  │ • auth/login       │         │ • users            │                     │
│  │ • auth/register    │         │ • achievements     │                     │
│  │ • profile/show     │         │ • update_requests  │                     │
│  │ • profile/edit     │         │ • feedback         │                     │
│  │ • alumni/dashboard │         │                    │                     │
│  │ • admin/approvals  │         │                    │                     │
│  │ • achievements/*   │         │                    │                     │
│  └────────────────────┘         └────────────────────┘                     │
│                                                                              │
└─────────────────────────────────────────────────────────────────────────────┘
```

#### 5.1.2 Data/Class Design

**Class Diagram:**

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                           Class Diagram                                      │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                              │
│  ┌──────────────────────────────────────────┐                               │
│  │                  User                     │                               │
│  ├──────────────────────────────────────────┤                               │
│  │ - id: integer                            │                               │
│  │ - student_id: string                     │                               │
│  │ - name: string                           │                               │
│  │ - email: string                          │                               │
│  │ - password: string (hashed)              │                               │
│  │ - role: string (alumni/admin)            │                               │
│  │ - account_locked_until: datetime         │                               │
│  │ - graduation_year: string                │                               │
│  │ - program: string                        │                               │
│  │ - current_position: string               │                               │
│  │ - current_company: string                │                               │
│  │ - phone_number: string                   │                               │
│  │ - linkedin_url: string                   │                               │
│  │ - bio: text                              │                               │
│  ├──────────────────────────────────────────┤                               │
│  │ + achievements(): HasMany                │                               │
│  │ + updateRequests(): HasMany              │                               │
│  │ + feedback(): HasMany                    │                               │
│  └────────────┬──────────────┬──────────────┘                               │
│               │              │                                               │
│    ┌──────────┘              └──────────┐                                   │
│    │ 1..*                          1..* │                                   │
│    ▼                                    ▼                                   │
│  ┌─────────────────────────┐  ┌─────────────────────────┐                  │
│  │      Achievement        │  │     UpdateRequest       │                  │
│  ├─────────────────────────┤  ├─────────────────────────┤                  │
│  │ - id: integer           │  │ - id: integer           │                  │
│  │ - user_id: integer (FK) │  │ - user_id: integer (FK) │                  │
│  │ - title: string         │  │ - new_full_name: string │                  │
│  │ - description: text     │  │ - file_path: string     │                  │
│  │ - event_date: date      │  │ - profile_data: json    │                  │
│  │ - file_path: string     │  │ - status: string        │                  │
│  │ - image_path: string    │  │ - rejection_reason: text│                  │
│  ├─────────────────────────┤  ├─────────────────────────┤                  │
│  │ + user(): BelongsTo     │  │ + user(): BelongsTo     │                  │
│  └─────────────────────────┘  └─────────────────────────┘                  │
│                                                                              │
│               │                                                              │
│    ┌──────────┘                                                             │
│    │ 1..*                                                                   │
│    ▼                                                                        │
│  ┌─────────────────────────┐                                               │
│  │        Feedback         │                                               │
│  ├─────────────────────────┤                                               │
│  │ - id: integer           │                                               │
│  │ - user_id: integer (FK) │                                               │
│  │ - message: text         │                                               │
│  ├─────────────────────────┤                                               │
│  │ + user(): BelongsTo     │                                               │
│  └─────────────────────────┘                                               │
│                                                                              │
└─────────────────────────────────────────────────────────────────────────────┘
```

#### 5.1.3 User Interface Design

The user interface was designed using **TailwindCSS** framework with IIUM branding colors (green `#006747` and gold `#C4A000`). The prototyping was done using **Blade templates** within Laravel.

**Benefits of TailwindCSS:**
- Utility-first approach for rapid development
- Responsive design out of the box
- Consistent styling across components
- Easy customization of design tokens

**Limitations:**
- Larger HTML file sizes due to utility classes
- Learning curve for utility-first approach

**Key UI Components:**

1. **Login Page**: Clean form with IIUM branding, email and password fields
2. **Alumni Dashboard**: Statistics cards, achievements table, update requests table
3. **Profile Page**: Tabbed interface (Personal, Academic, Professional) with sidebar navigation
4. **Admin Approvals Page**: List of pending requests with view/approve/reject actions

---

## 6 Implementation Phase

### 6.1 Implementation Activities

The implementation was carried out using Laravel framework with the following tools and technologies:

**Development Environment:**
- **IDE**: Visual Studio Code
- **Version Control**: Git with GitHub
- **Package Manager**: Composer (PHP), NPM (JavaScript)
- **Database**: MySQL
- **Local Development**: Laravel's built-in development server

**Prototype Link:** <Insert your deployment/prototype URL here>

**Access Credentials:**
- Alumni Account: <email> / <password>
- Admin Account: <email> / <password>

#### Feature 1 - Login Page

The login page provides a clean interface for user authentication with email and password fields. It includes IIUM branding with green and gold colors, error message display for failed attempts, and a link to the registration page.

**Key Implementation:**
- Form validation for email format and required fields
- CSRF protection using Laravel's `@csrf` directive
- Account lockout display showing remaining lockout time
- Session regeneration after successful login

![Login Page Snapshot](snapshots/login_page.png)

#### Feature 2 - Alumni Dashboard

The alumni dashboard displays a comprehensive overview of the user's activities including:
- **Statistics Cards**: Total achievements, approved requests, pending requests, feedback count
- **Achievements Table**: List of recent achievements with title and date
- **Update Requests Table**: Status of submitted profile update requests with color-coded badges

**Key Implementation:**
- Dynamic statistics calculation from database
- Color-coded status badges (green for approved, yellow for pending, red for rejected)
- Quick navigation to create new achievements

![Alumni Dashboard Snapshot](snapshots/alumni_dashboard.png)

#### Feature 3 - Profile Page with Tabbed Interface

The profile page features a modern tabbed interface with three sections:
- **Personal Information**: Name, email, phone, LinkedIn, bio
- **Academic Information**: Matric number, program, graduation year
- **Professional Details**: Current position, company, and achievements list

**Key Implementation:**
- JavaScript-based tab switching without page reload
- Responsive sidebar navigation
- Avatar display with user initial
- Integrated achievement management

![Profile Page Snapshot](snapshots/profile_page.png)

#### Feature 4 - Admin Approvals Page

The admin approvals page provides a centralized view for administrators to:
- View all pending update requests
- See requester name and submission date
- Navigate to detailed view of proposed changes
- Approve or reject requests with reasons

**Key Implementation:**
- Database transaction for atomic approval operations
- JSON storage and retrieval of profile changes
- Comparison table showing current vs. proposed values
- Rejection reason capture and storage

![Admin Approvals Snapshot](snapshots/admin_approvals.png)

#### Feature 5 - Achievement Management

The achievement management feature allows alumni to:
- Create new achievements with title, date, and description
- Upload PDF documents and images as supporting evidence
- Edit existing achievements
- Delete achievements with confirmation

**Key Implementation:**
- File upload with validation (PDF up to 10MB, images up to 5MB)
- Storage in public disk with symbolic link
- Authorization checks to prevent unauthorized access
- Automatic file path management

![Achievement Form Snapshot](snapshots/achievement_form.png)

---

## 7 Testing Phase

### 7.1 Testing Activities

Testing was conducted throughout the development process with both automated and manual testing approaches. Each team member contributed test cases focusing on different modules.

#### Test Case 1: Verify User Registration with Valid Data

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | REG_01 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | High |
| **Test Designed date:** | <Date> |
| **Module Name:** | Authentication |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify user registration with valid data |
| **Test Execution date:** | <Date> |
| **Description:** | Test the registration functionality with all valid inputs |
| **Pre-conditions:** | User is not registered, registration page is accessible |
| **Technique:** | Equivalence Partition – Valid Partition |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to registration page | /register | Registration form is displayed | | |
| 2 | Enter valid name | Name: "Ahmad Bin Abdullah" | Name field accepts input | | |
| 3 | Enter valid student ID | Student ID: "2012345" | Student ID field accepts input | | |
| 4 | Enter valid email | Email: alumni@example.com | Email field accepts input | | |
| 5 | Enter valid password | Password: "SecurePass123" | Password field accepts input (masked) | | |
| 6 | Confirm password | Confirm: "SecurePass123" | Confirm field accepts matching password | | |
| 7 | Click Register button | Submit | User is registered and redirected to dashboard | | |

**Post-conditions:**
- User account is created in database with role "alumni"
- User is logged in automatically
- Password is stored as hashed value

---

#### Test Case 2: Verify Login Account Lockout After Failed Attempts

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | AUTH_02 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | High |
| **Test Designed date:** | <Date> |
| **Module Name:** | Authentication |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify account lockout after 3 failed login attempts |
| **Test Execution date:** | <Date> |
| **Description:** | Test the security feature that locks accounts after multiple failed login attempts |
| **Pre-conditions:** | User account exists and is not currently locked |
| **Technique:** | Boundary Value Analysis |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to login page | /login | Login form is displayed | | |
| 2 | Enter valid email | Email: user@example.com | Email is accepted | | |
| 3 | Enter wrong password (1st attempt) | Password: "wrong1" | Error: "Invalid credentials" | | |
| 4 | Enter wrong password (2nd attempt) | Password: "wrong2" | Error: "Invalid credentials" | | |
| 5 | Enter wrong password (3rd attempt) | Password: "wrong3" | Account locked message with 15 min lockout | | |
| 6 | Try to login with correct password | Password: "CorrectPass" | Error: "Account locked. Try again in X minutes" | | |
| 7 | Wait 15 minutes and try again | | Login is successful | | |

**Post-conditions:**
- account_locked_until field is set in database
- Cache stores failed attempt count
- After lockout expires, user can login normally

---

#### Test Case 3: Verify Achievement Creation with File Upload

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | ACH_01 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | Medium |
| **Test Designed date:** | <Date> |
| **Module Name:** | Achievement Management |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify achievement creation with file and image upload |
| **Test Execution date:** | <Date> |
| **Description:** | Test creating a new achievement with supporting documents |
| **Pre-conditions:** | User is logged in as alumni |
| **Technique:** | Equivalence Partition – Valid Partition |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to achievements page | /achievements | Achievements list is displayed | | |
| 2 | Click "Add Achievement" | Button click | Achievement creation form is displayed | | |
| 3 | Enter achievement title | Title: "Best Paper Award" | Title field accepts input | | |
| 4 | Select event date | Date: 2025-12-01 | Date picker works correctly | | |
| 5 | Enter description | Description: "Awarded..." | Description field accepts text | | |
| 6 | Upload PDF document | File: certificate.pdf (2MB) | File is accepted | | |
| 7 | Upload image | Image: award_photo.jpg (1MB) | Image is accepted | | |
| 8 | Click Submit | Submit button | Success message displayed | | |
| 9 | Verify achievement appears | Achievement list | New achievement shown in list | | |

**Post-conditions:**
- Achievement record created in database
- Files stored in storage/app/public/achievements
- Files accessible via public URL

---

#### Test Case 4: Verify Achievement Edit Authorization

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | ACH_02 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | High |
| **Test Designed date:** | <Date> |
| **Module Name:** | Achievement Management |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify user cannot edit another user's achievement |
| **Test Execution date:** | <Date> |
| **Description:** | Test authorization to ensure users can only edit their own achievements |
| **Pre-conditions:** | Two user accounts exist with achievements |
| **Technique:** | Security Testing |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Login as User A | user_a@example.com | Login successful | | |
| 2 | Create an achievement | Title: "User A Award" | Achievement created, ID noted | | |
| 3 | Logout | Logout button | Logged out successfully | | |
| 4 | Login as User B | user_b@example.com | Login successful | | |
| 5 | Attempt to access User A's achievement edit page | /achievements/{id}/edit | 403 Forbidden response | | |
| 6 | Attempt to submit edit via POST | PUT request to /achievements/{id} | 403 Forbidden response | | |

**Post-conditions:**
- User A's achievement remains unchanged
- Unauthorized access is blocked at controller level

---

#### Test Case 5: Verify Feedback Submission

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | FB_01 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | Medium |
| **Test Designed date:** | <Date> |
| **Module Name:** | Feedback |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify feedback submission with valid message |
| **Test Execution date:** | <Date> |
| **Description:** | Test the feedback submission functionality |
| **Pre-conditions:** | User is logged in as alumni |
| **Technique:** | Equivalence Partition – Valid Partition |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to feedback page | /feedback | Feedback form is displayed | | |
| 2 | Enter feedback message | Message: "Great system..." | Text area accepts input | | |
| 3 | Click Submit | Submit button | Success message displayed | | |
| 4 | Verify redirect | Dashboard | Redirected to dashboard | | |
| 5 | Check dashboard feedback count | Stats card | Feedback count incremented | | |

**Post-conditions:**
- Feedback record created in database with user_id
- Feedback count reflects new submission

---

#### Test Case 6: Verify Empty Feedback Validation

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | FB_02 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | Low |
| **Test Designed date:** | <Date> |
| **Module Name:** | Feedback |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify feedback submission fails with empty message |
| **Test Execution date:** | <Date> |
| **Description:** | Test validation on empty feedback submission |
| **Pre-conditions:** | User is logged in as alumni |
| **Technique:** | Equivalence Partition – Invalid Partition |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to feedback page | /feedback | Feedback form is displayed | | |
| 2 | Leave message field empty | Message: "" | Field shows as empty | | |
| 3 | Click Submit | Submit button | Validation error displayed | | |
| 4 | Verify error message | Error text | "The message field is required." | | |

**Post-conditions:**
- No feedback record created
- User remains on feedback page

---

#### Test Case 7: Verify Admin Can View Update Request Details

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | ADM_01 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | High |
| **Test Designed date:** | <Date> |
| **Module Name:** | Admin Approval |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify admin can view detailed update request |
| **Test Execution date:** | <Date> |
| **Description:** | Test the admin's ability to view pending request details |
| **Pre-conditions:** | Admin is logged in, pending update request exists |
| **Technique:** | Functional Testing |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Navigate to admin approvals | /admin/approvals | List of pending requests shown | | |
| 2 | Click "View" on a request | View button | Request details page opens | | |
| 3 | Verify requester information | Request info section | Requester name and date shown | | |
| 4 | Verify comparison table | Changes table | Current vs Proposed values displayed | | |
| 5 | Verify action buttons | Approve/Reject buttons | Both buttons are visible and clickable | | |

**Post-conditions:**
- Admin has full visibility of proposed changes
- Changed fields are highlighted

---

#### Test Case 8: Verify Dashboard Role-Based Redirection

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | DASH_01 |
| **Test Designed by:** | <Team Member Name> |
| **Test Priority:** | High |
| **Test Designed date:** | <Date> |
| **Module Name:** | Dashboard |
| **Test Executed by:** | <Tester Name> |
| **Test Title:** | Verify role-based dashboard redirection |
| **Test Execution date:** | <Date> |
| **Description:** | Test that users are redirected to appropriate dashboards based on role |
| **Pre-conditions:** | Both alumni and admin accounts exist |
| **Technique:** | Functional Testing |

**Test Steps:**

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status |
|------|------------|-----------|-----------------|---------------|--------|
| 1 | Login as alumni | alumni@example.com | Login successful | | |
| 2 | Check redirect destination | /dashboard | Redirected to /alumni/dashboard | | |
| 3 | Verify alumni dashboard content | Page content | Shows stats cards and achievements | | |
| 4 | Logout | Logout button | Logged out | | |
| 5 | Login as admin | admin@example.com | Login successful | | |
| 6 | Check redirect destination | /dashboard | Redirected to /admin/approvals | | |
| 7 | Verify admin dashboard content | Page content | Shows pending approvals list | | |

**Post-conditions:**
- Each user type sees appropriate dashboard
- Navigation options match user role

---

## 8 Lesson Learned

### 8.1 Getting Used to the MVC Structure

At first, it was kind of confusing to know exactly where to put our code. We didn't know if we should write the logic for approving requests inside the route file or the controller. But after trying it out, we learned that it is much cleaner to put the main logic in the `AdminController`. We used the `web.php` file mostly just for checking if a user is logged in using middleware. This made it way easier to work on the project without getting lost in one big file.

**Key Takeaways:**
- Controllers should contain the main business logic
- Routes file (`web.php`) is best used for URL mapping and middleware
- Separation of concerns makes the codebase more maintainable
- Laravel's MVC structure becomes clearer with hands-on practice

### 8.2 Making Sure the Database Stays Correct

In the Admin part, we ran into a problem with updating data. When an admin approves a request, the system needs to do two things at once: change the request status to 'approved' and also update the user's profile with the new info. We realized that if the system crashed halfway, the data would be messed up. To fix this, we used `DB::transaction` in our code. It basically makes sure that either both updates happen, or none of them do, so our database stays safe.

**Key Takeaways:**
- Database transactions ensure data integrity
- `DB::transaction()` in Laravel provides atomic operations
- Multiple related database operations should be wrapped in transactions
- Partial updates can lead to data inconsistencies

### 8.3 Handling File Uploads Properly

Working on the Achievement page was actually harder than we thought because of the file uploads. We learned that we can't just let users upload anything they want. We had to add specific checks to make sure the files are only PDF or images and aren't too big. We also found out that it is better to save the actual file in the public folder and just save the path in the database, instead of trying to save the whole file in the database which makes it slow.

**Key Takeaways:**
- File validation is crucial for security (type and size limits)
- Store files in the filesystem, not in the database
- Use Laravel's `store()` method with the 'public' disk
- Create symbolic links for public file access

---

## References

1. Akintoye, A. (2025). API Development with Laravel: A Quick Start Guide. Apress.
2. Joshi, K., et al. (2022). A Framework Optimization in Social Media using Xampp. 2022 ICFIRTP, 1–4.
3. Laravel. (2025). Laravel 11.x Documentation. https://laravel.com/docs/11.x
4. Mohan, C. C., et al. (2022). E-Health Centre Maintenance System using PHP. IJARSCT, 859–865.
5. Nguyen, L. A. T., et al. (2022). Design and Implementation of Web Application Based on MVC Laravel Architecture. EJECE, 6(4), 23–29.
6. Pressman, R. S., & Maxim, B. R. (2020). Software Engineering: A Practitioner's Approach (9th ed.). McGraw-Hill Education.
7. Sommerville, I. (2016). Software Engineering (10th ed.). Pearson Education.
8. Subecz, Z. (2021). Web-development with Laravel framework. Gradus, 8(1), 211–218.
9. TailwindCSS Documentation. (2025). Retrieved from https://tailwindcss.com/docs/
10. International Islamic University Malaysia. (2025). Official Website. Retrieved from https://www.iium.edu.my/

---

**Document Version:** 1.0  
**Last Updated:** January 2026  
**Prepared by:** KICT Alumni Management System Development Team
