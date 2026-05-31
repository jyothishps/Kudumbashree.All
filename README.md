# Kudumbashree.All - Unit Automation System

A web-based management system to digitalize the operations of a Kudumbashree Unit. Say goodbye to heavy paperwork!

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)
![Status](https://img.shields.io/badge/Status-Complete-success?style=for-the-badge)

---

## 📖 Table of Contents
- [About](#about)
- [Features](#features)
- [Installation](#installation)
- [How It Works](#how-it-works)
- [User Roles](#user-roles)
- [Technologies Used](#technologies-used)
- [Database Schema](#database-schema)
- [Project Structure](#project-structure)
- [Screenshots](#screenshots)
- [Future Enhancements](#future-enhancements)

---

## 🎯 About

**Kudumbashree.All** is a web application built to automate the day-to-day activities of a Kudumbashree Unit (NHG). It replaces manual paperwork with a centralized digital system for managing members, meetings, programs, attendance, loans, complaints, and feedback.

> *"An Innovative Solution for Efficient Management of Kudumbashree Units."*

Kudumbashree is a Government of Kerala initiative for poverty eradication and women empowerment, operating through a three-tier structure: NHGs → ADS → CDS. This project targets the grassroots — the individual NHG unit.

Developed at the **Department of Computer Science, Nirmala College Muvattupuzha**.

---

## ✨ Features

### 🛠️ **Admin**
- **Secretary Management** — Add and manage secretary with full profile and proof upload
- **Members Approval** — Accept or reject member sign-up requests
- **Programs Viewing** — Browse all unit programs with details
- **Minutes Viewing** — Read meeting minutes and reports
- **Complaints Handling** — View and reply to member complaints
- **Feedbacks** — Monitor member feedback

### 📋 **Secretary**
- **Profile Management** — View and edit personal profile
- **Meeting Management** — Add meeting details, minutes reports, and attendance
- **Program Management** — Create programs, add attendance, and upload photos
- **Loan Management** — Post available loan schemes and review/approve applications
- **Attendance Tracking** — Mark members as Present or Absent per meeting/program

### 👩 **Member**
- **Attendance View** — Check personal attendance history for meetings and programs
- **Minutes Viewing** — Read meeting minutes posted by secretary
- **Programs Viewing** — Browse unit programs and gallery
- **Loan Applying** — Apply for available loans with a written request
- **Loan Status** — Track application status (Pending / Approved / Rejected)
- **Complaints** — Raise complaints and receive replies
- **Feedback** — Submit feedback to the unit

---

## 💻 Installation

### Prerequisites
- XAMPP 3.3.0 or higher (Apache + MySQL)
- A web browser (Google Chrome recommended)

### Check if XAMPP is Running
Open XAMPP Control Panel and ensure **Apache** and **MySQL** are both started.

### Steps to Run

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/Kudumbashree.All.git
   ```

2. **Move to XAMPP's web root**
   ```bash
   # Copy the project folder to:
   C:/xampp/htdocs/Kudumbashree.All
   ```

3. **Import the database**
   - Open your browser and go to `http://localhost/phpmyadmin`
   - Create a new database named `kudumbashree`
   - Click **Import** and select the `.sql` file from the project folder

4. **Configure the database connection**
   - Open `config.php` (or `connection.php`) in the project root
   - Set your database credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "kudumbashree";
   ```

5. **Run the project**
   - Open your browser and go to:
   ```
   http://localhost/Kudumbashree.All
   ```

---

## 🔄 How It Works

### System Flow

1. **Admin logs in**
   - Adds a secretary with credentials
   - Approves or rejects member sign-up requests

2. **Members sign up**
   - Fill the registration form with name, address, contact, photo, and ID proof
   - Wait for admin approval before logging in

3. **Secretary manages the unit**
   - Records meetings and writes minutes
   - Marks attendance for meetings and programs
   - Posts available loan schemes

4. **Members participate**
   - View their attendance and meeting minutes
   - Browse programs and photo galleries
   - Apply for loans and track approval status
   - Submit complaints and feedback

### Controls
- **Login** — Enter email and password to access your role-based dashboard
- **Sign Up** — Members register through the public sign-up form
- **Present / Absent** — Secretary marks attendance per member per meeting
- **Approve / Reject** — Admin and Secretary manage member and loan requests

---

## 👥 User Roles

| Role | Capabilities |
|---|---|
| 🔴 **Admin** | Add secretary, approve/reject members, view programs, view minutes, handle complaints and feedbacks |
| 🟠 **Secretary** | Manage meetings, programs, attendance, loans, loan requests, and approved loans |
| 🟢 **Member** | View attendance, minutes, programs, apply for loans, track loan status, raise complaints, give feedback |

---

## 🛠️ Technologies Used

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, Bootstrap |
| Scripting | JavaScript |
| Backend | PHP |
| Database | MySQL |
| Web Server | XAMPP (Apache) |
| IDE | Visual Studio Code |
| Browser | Google Chrome |

### Key Concepts
- Role-Based Access Control (Admin / Secretary / Member)
- Server-Side and Client-Side Validation
- File Uploads (Photo & ID Proof)
- Session Management
- CRUD Operations
- Responsive UI with Bootstrap

---

## 🗄️ Database Schema

| Table | Description |
|---|---|
| `tbl_admin` | Admin credentials |
| `tbl_secretary` | Secretary profiles and authentication |
| `tbl_member` | Member profiles, authentication, and approval status |
| `tbl_meeting` | Meeting dates and details |
| `tbl_meetingreport` | Minutes/reports for each meeting |
| `tbl_program` | Program names and details |
| `tbl_gallery` | Program photos |
| `tbl_meetingattendance` | Member attendance per meeting |
| `tbl_programattendance` | Member attendance per program |
| `tbl_loan` | Available loan schemes posted by secretary |
| `tbl_loanapply` | Member loan applications and approval status |
| `tbl_complaint` | Member complaints and secretary/admin replies |
| `tbl_feedback` | Member feedback submissions |

---

## 📁 Project Structure

```
Kudumbashree.All/
├── Admin/
│   ├── home.php               # Admin dashboard
│   ├── add_secretary.php      # Add secretary form
│   ├── members_approval.php   # Approve/reject members
│   ├── programs.php           # View programs
│   ├── minutes.php            # View meeting minutes
│   ├── complaints.php         # View and reply complaints
│   └── feedbacks.php          # View feedbacks
├── Secretary/
│   ├── home.php               # Secretary dashboard
│   ├── meetings.php           # Manage meetings & minutes
│   ├── programs.php           # Manage programs & gallery
│   ├── loans.php              # Post loan schemes
│   ├── loan_requests.php      # View loan applications
│   └── approved_loans.php     # View approved loans
├── Member/
│   ├── home.php               # Member dashboard
│   ├── attendance.php         # View attendance
│   ├── minutes.php            # View meeting minutes
│   ├── programs.php           # View programs
│   ├── loans.php              # Browse loan schemes
│   ├── apply_loan.php         # Apply for a loan
│   ├── my_loan.php            # Track loan status
│   ├── complaint.php          # Submit complaints
│   └── feedback.php           # Submit feedback
├── uploads/                   # Uploaded photos and proofs
├── config.php                 # Database connection
├── login.php                  # Login page
├── signup.php                 # Member sign-up page
├── index.php                  # Homepage
└── README.md
```

---

## 📸 Screenshots

| Screen | Description |
|---|---|
| **Homepage** | Landing page with Login and Sign Up options |
| **Login** | Email and password login with Remember Me |
| **Sign Up** | Member registration with photo and proof upload |
| **Admin Homepage** | Personalized welcome dashboard for admin |
| **Secretary Homepage** | Secretary's dashboard with sidebar navigation |
| **Member Homepage** | Member's personalized welcome page |
| **Add Secretary** | Admin form to register a new secretary |
| **Members Approval** | Admin view showing Pending, Accepted members with Approve/Reject |
| **View Programs** | Program listing with name, details, and gallery |
| **View Minutes** | Meeting minutes with date and full text |
| **Profile** | Secretary profile with Overview, Edit Profile, Change Password tabs |
| **Meeting** | Secretary adds meeting details, minutes, and manages attendance |
| **Attendance** | Secretary marks Present/Absent per member |
| **Program** | Secretary adds programs, attendance, and photos |
| **Loan** | Secretary posts loan scheme name and details |
| **Loan Request** | Secretary views and Approves/Rejects member loan applications |
| **Approved Loan** | Secretary views list of all approved loans |
| **Attendance (Member)** | Member views their own attendance history with date and status |
| **Apply Loan** | Member submits a written loan application request |
| **Loan Status** | Member tracks all loan applications with Approved/Pending status |

---

## 🚀 Future Enhancements

- [ ] SMS or WhatsApp notifications for meetings and loan updates
- [ ] Monthly attendance reports with percentage calculation
- [ ] Financial tracking — savings, thrift, and loan repayment records
- [ ] PDF export of meeting minutes and attendance reports
- [ ] Mobile-responsive progressive web app (PWA)
- [ ] Multi-unit support for ADS and CDS levels
- [ ] Dashboard analytics with charts for admin overview

---

## 👨‍💻 Author

**Jyothish P S**
- GitHub: [@jyothishps](https://github.com/jyothishps)
- Email: psjyothish07@gmail.com

---

## ⭐ Show Your Support

Give a ⭐ if you like this project!

---

**Made with ❤️ and PHP**
