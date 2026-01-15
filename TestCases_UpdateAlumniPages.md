# Test Cases for Update Alumni Pages
## KICT Alumni Management System

---

## Test Case-1: Verify Profile Update with Valid Data Submission

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | UAP_01 |
| **Test Designed by:** | \<Name of the test case author\> |
| **Test Priority:** | High |
| **Test Designed date:** | 28 December 2025 |
| **Module Name:** | Profile Management |
| **Test Executed by:** | \<Tester - Name of the other team member who performs the test\> |
| **Test Title:** | Verify profile update with valid data submission |
| **Test Execution date:** | \<Date\> |
| **Description:** | Test the profile edit functionality where alumni can update their personal, academic, and professional information and submit for admin approval |
| **Pre-conditions:** | User has already registered as an alumnus and is logged into the system. User has existing profile data. |
| **Technique:** | Equivalence Partition – Valid Partition |
| **Dependencies:** | Test REQ-PROFILE-001, REQ-UPDATE-001 |

### Test Steps

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status (Pass/Fail) |
|------|------------|-----------|-----------------|---------------|-------------------|
| 1 | Navigate to Profile page | Link: http://localhost/profile | Profile page is displayed with current user information | | |
| 2 | Click on "Edit Profile" button | Edit Profile button | Edit Profile form is displayed with pre-filled current data | | |
| 3 | Update the Full Name field | Name: "Ahmad Bin Abdullah" | Full Name field accepts the new value | | |
| 4 | Update the Email field | Email: alumni2023@gmail.com | Email field accepts the valid email format | | |
| 5 | Update the Graduation Year field | Graduation Year: 2023 | Graduation Year field accepts the numeric year value | | |
| 6 | Update the Program field | Program: "Bachelor of Information Technology (BIT)" | Program field accepts the text value | | |
| 7 | Update the Current Position field | Current Position: "Software Engineer" | Current Position field accepts the text value | | |
| 8 | Update the Current Company field | Current Company: "TechCorp Sdn Bhd" | Current Company field accepts the text value | | |
| 9 | Click "Update Profile" button | Update Profile button | Success message is displayed: "Your profile update request has been submitted and is pending admin approval." | | |
| 10 | Navigate to Alumni Dashboard | Link: http://localhost/alumni/dashboard | Dashboard is displayed with the new update request showing "Pending" status | | |

### Post-conditions:
- Update request is created in the database with status "pending"
- The update request contains all the proposed profile changes in JSON format
- The alumni dashboard shows the new request in "My Update Requests" table
- Admin can view the pending request in the approvals page

---

## Test Case-2: Verify Profile Update with Invalid Email Format

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | UAP_02 |
| **Test Designed by:** | \<Name of the test case author\> |
| **Test Priority:** | Medium |
| **Test Designed date:** | 28 December 2025 |
| **Module Name:** | Profile Management |
| **Test Executed by:** | \<Tester - Name of the other team member who performs the test\> |
| **Test Title:** | Verify profile update with invalid email format shows validation error |
| **Test Execution date:** | \<Date\> |
| **Description:** | Test the email validation on the profile edit form to ensure invalid email formats are rejected |
| **Pre-conditions:** | User has already registered as an alumnus and is logged into the system. User is on the Edit Profile page. |
| **Technique:** | Equivalence Partition – Invalid Partition |
| **Dependencies:** | Test REQ-PROFILE-002, REQ-VALIDATION-001 |

### Test Steps

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status (Pass/Fail) |
|------|------------|-----------|-----------------|---------------|-------------------|
| 1 | Navigate to Profile page | Link: http://localhost/profile | Profile page is displayed with current user information | | |
| 2 | Click on "Edit Profile" button | Edit Profile button | Edit Profile form is displayed with pre-filled current data | | |
| 3 | Keep all other fields unchanged | Existing data | All fields retain their current values | | |
| 4 | Enter an invalid email without "@" symbol | Email: "invalidemailformat" | Email field accepts the input (client-side) | | |
| 5 | Click "Update Profile" button | Update Profile button | Form submission is prevented. Validation error message is displayed indicating invalid email format | | |
| 6 | Enter an invalid email without domain | Email: "user@" | Email field accepts the input (client-side) | | |
| 7 | Click "Update Profile" button | Update Profile button | Form submission is prevented. Validation error message is displayed | | |
| 8 | Enter an invalid email with special characters | Email: "user!#$%@domain.com" | Email field accepts the input (client-side) | | |
| 9 | Click "Update Profile" button | Update Profile button | Form submission is prevented or server-side validation error is displayed | | |

### Post-conditions:
- No update request is created in the database
- User remains on the Edit Profile page
- Validation error messages are clearly visible to the user
- The original profile data remains unchanged

---

## Test Case-3: Verify Admin Approval of Profile Update Request

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | UAP_03 |
| **Test Designed by:** | \<Name of the test case author\> |
| **Test Priority:** | High |
| **Test Designed date:** | 28 December 2025 |
| **Module Name:** | Admin Approval Management |
| **Test Executed by:** | \<Tester - Name of the other team member who performs the test\> |
| **Test Title:** | Verify admin can approve a pending profile update request |
| **Test Execution date:** | \<Date\> |
| **Description:** | Test the admin approval workflow where admin reviews and approves a pending profile update request submitted by an alumnus |
| **Pre-conditions:** | Admin user is logged into the system with admin privileges. There exists at least one pending update request from an alumnus. |
| **Technique:** | Boundary Value Analysis – Valid Approval Process |
| **Dependencies:** | Test REQ-ADMIN-001, REQ-APPROVAL-001 |

### Test Steps

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status (Pass/Fail) |
|------|------------|-----------|-----------------|---------------|-------------------|
| 1 | Navigate to Admin Approvals page | Link: http://localhost/admin/approvals | Admin Approvals page is displayed with list of pending update requests | | |
| 2 | Identify a pending update request | Status: "Pending" (Yellow badge) | Pending request is visible in the list with requester name and submission date | | |
| 3 | Click "View" button for the pending request | View button | Request details page is displayed showing proposed changes comparison table | | |
| 4 | Review the proposed changes | Current Value vs Proposed Value table | Admin can see the field-by-field comparison of current and proposed values. Changed fields are highlighted in yellow background | | |
| 5 | Verify the request information section | Request Information section | Requester name, submission date, and current status are displayed correctly | | |
| 6 | Click "Approve" button | Approve button | Success message is displayed and admin is redirected to the approvals list | | |
| 7 | Verify the request status has changed | Status column | The request now shows "Approved" status with green badge | | |
| 8 | Login as the alumnus who made the request | Alumni credentials | Alumni can login successfully | | |
| 9 | Navigate to Alumni Dashboard | Link: http://localhost/alumni/dashboard | Dashboard shows the update request with "Approved" status (green badge) | | |
| 10 | Navigate to Profile page | Link: http://localhost/profile | Profile page displays the updated information that was approved | | |

### Post-conditions:
- Update request status is changed to "approved" in the database
- The alumnus's profile data is updated with the approved changes
- The alumnus can see the approved status in their dashboard
- The profile page reflects the approved changes

---

## Test Case-4: Verify Admin Rejection of Profile Update Request with Reason

| **TEST CASE** | |
|---|---|
| **Test Case ID:** | UAP_04 |
| **Test Designed by:** | \<Name of the test case author\> |
| **Test Priority:** | High |
| **Test Designed date:** | 28 December 2025 |
| **Module Name:** | Admin Approval Management |
| **Test Executed by:** | \<Tester - Name of the other team member who performs the test\> |
| **Test Title:** | Verify admin can reject a profile update request with rejection reason |
| **Test Execution date:** | \<Date\> |
| **Description:** | Test the admin rejection workflow where admin reviews and rejects a pending profile update request with a specified rejection reason |
| **Pre-conditions:** | Admin user is logged into the system with admin privileges. There exists at least one pending update request from an alumnus. |
| **Technique:** | Boundary Value Analysis – Valid Rejection Process |
| **Dependencies:** | Test REQ-ADMIN-002, REQ-REJECTION-001 |

### Test Steps

| Step | Test Steps | Test Data | Expected Result | Actual Result | Status (Pass/Fail) |
|------|------------|-----------|-----------------|---------------|-------------------|
| 1 | Navigate to Admin Approvals page | Link: http://localhost/admin/approvals | Admin Approvals page is displayed with list of pending update requests | | |
| 2 | Identify a pending update request | Status: "Pending" (Yellow badge) | Pending request is visible in the list with requester name and submission date | | |
| 3 | Click "View" button for the pending request | View button | Request details page is displayed showing proposed changes comparison table | | |
| 4 | Review the proposed changes | Current Value vs Proposed Value table | Admin can see the field-by-field comparison of current and proposed values | | |
| 5 | Enter a rejection reason in the text field | Rejection reason: "Invalid matric number format. Please provide correct matric number starting with year prefix." | Rejection reason text field accepts the input | | |
| 6 | Click "Reject" button | Reject button | Success message is displayed and admin is redirected to the approvals list | | |
| 7 | Verify the request status has changed | Status column | The request now shows "Rejected" status with red badge | | |
| 8 | Login as the alumnus who made the request | Alumni credentials | Alumni can login successfully | | |
| 9 | Navigate to Alumni Dashboard | Link: http://localhost/alumni/dashboard | Dashboard shows the update request with "Rejected" status (red badge) | | |
| 10 | Verify rejection reason is displayed | Reason column in My Update Requests table | The rejection reason "Invalid matric number format. Please provide correct matric number starting with year prefix." is displayed in red text | | |
| 11 | Navigate to Profile page | Link: http://localhost/profile | Profile page still displays the original information (changes were not applied) | | |

### Post-conditions:
- Update request status is changed to "rejected" in the database
- The rejection_reason field is populated with the admin's specified reason
- The alumnus's profile data remains unchanged (original data preserved)
- The alumnus can view the rejection reason on their dashboard
- The alumnus can submit a new update request with corrected information

---

## Summary

| Test Case ID | Test Title | Priority | Module |
|--------------|------------|----------|--------|
| UAP_01 | Verify profile update with valid data submission | High | Profile Management |
| UAP_02 | Verify profile update with invalid email format | Medium | Profile Management |
| UAP_03 | Verify admin can approve a pending profile update request | High | Admin Approval Management |
| UAP_04 | Verify admin can reject a profile update request with reason | High | Admin Approval Management |

---

**Note:** Replace `\<Name of the test case author\>`, `\<Tester - Name of the other team member who performs the test\>`, and `\<Date\>` with actual names and dates when executing the test cases.
