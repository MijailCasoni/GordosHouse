<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 class="text-center mb-4">Admin Dashboard</h3>
        <a href="#statistics" onclick="showSection('statistics')">Statistics</a>
        <a href="#contacts" onclick="showSection('contacts')">Contacts</a>
        <a href="{{ route('images.index') }}">Image Management</a>
        <a href="{{ route('users.index') }}">User Management</a>
        <a href="{{ route('profile.edit') }}">Profile</a>
        <a href="{{ route('settings.index') }}">Settings</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
        </form>
    </div>

    <div class="content">
        <h1 class="mb-4">Dashboard Overview</h1>

        <div id="statistics-section" class="dashboard-section">
            <h2>Statistics</h2>
            <div class="mb-3">
                <label for="filter" class="form-label">Filter by:</label>
                <select id="filter" class="form-select w-auto" onchange="fetchStatistics()">
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Page Visits</div>
                        <div class="card-body">
                            <h5 class="card-title" id="pageVisits">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Clicks</div>
                        <div class="card-body">
                            <h5 class="card-title" id="clicks">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Form Submissions</div>
                        <div class="card-body">
                            <h5 class="card-title" id="formSubmissions">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">WhatsApp Interactions</div>
                        <div class="card-body">
                            <h5 class="card-title" id="whatsappInteractions">0</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" onclick="exportCsv('page_visits')">Export Page Visits CSV</button>
                <button class="btn btn-success" onclick="exportCsv('clicks')">Export Clicks CSV</button>
                <button class="btn btn-warning" onclick="exportCsv('form_submissions')">Export Form Submissions CSV</button>
                <button class="btn btn-info" onclick="exportCsv('whatsapp_interactions')">Export WhatsApp Interactions CSV</button>
            </div>
        </div>

        <div id="contacts-section" class="dashboard-section" style="display:none;">
            <h2>Contacts</h2>
            <button class="btn btn-primary mb-3" onclick="exportCsv('contacts')">Export Contacts CSV</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="contactsTableBody">
                    <!-- Contacts will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchStatistics();
            fetchContacts();
        });

        function showSection(sectionId) {
            document.querySelectorAll('.dashboard-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId + '-section').style.display = 'block';
        }

        async function fetchStatistics() {
            const filter = document.getElementById('filter').value;
            const response = await fetch(`/dashboard/statistics?filter=${filter}`);
            const data = await response.json();

            document.getElementById('pageVisits').innerText = data.page_visits;
            document.getElementById('clicks').innerText = data.clicks;
            document.getElementById('formSubmissions').innerText = data.form_submissions;
            document.getElementById('whatsappInteractions').innerText = data.whatsapp_interactions;
        }

        async function fetchContacts() {
            const response = await fetch('/dashboard/contacts');
            const contacts = await response.json();
            const tableBody = document.getElementById('contactsTableBody');
            tableBody.innerHTML = ''; // Clear existing rows

            contacts.forEach(contact => {
                const row = tableBody.insertRow();
                row.insertCell().innerText = contact.name;
                row.insertCell().innerText = contact.email;
                row.insertCell().innerText = contact.phone || 'N/A';
                row.insertCell().innerText = contact.message;
                row.insertCell().innerText = new Date(contact.created_at).toLocaleString();
            });
        }

        function exportCsv(type) {
            const filter = document.getElementById('filter').value;
            window.location.href = `/dashboard/export-csv?type=${type}&filter=${filter}`;
        }
    </script>
</body>
</html>