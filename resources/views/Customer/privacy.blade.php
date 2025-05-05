<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright - Privacy Policy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <style>
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 0;
            margin: 0 325px; 
            border-bottom: 1px solid #ccc;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .hero-section p {
            text-align: center;
            font-size: 1.2rem;
        }
        .card {
            border-radius: 10px;
        }
        .list-group-item {
            border: none;
            padding-left: 0;
        }
        .section-title {
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .hero-section {
                margin: 0 20px;
            }
        }
    </style>
</head>
<body>

    {{-- Include Navigation --}}
    @include('Customer.navigation')

    {{-- Hero Section --}}
    <div class="hero-section">
        <h1>Privacy Policy</h1>
        <p>Your data is used solely to deliver our services and is never sold to third parties.</p>
    </div>

    {{-- Main Content --}}
    <div class="container pt-5 mb-5">
        <div class="border-0 px-4">
            <div class="card-body">
                <h2 class="text-primary section-title">Introduction</h2>
                <p class="text-muted">
                    Welcome to our Privacy Policy page. Your privacy is critically important to us. This policy outlines the types of personal information we collect, how we use it, and the measures we take to protect it.
                </p>

                <h3 class="mt-4 text-secondary section-title">Information We Collect</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Personal identification information (Name, email address, phone number, etc.)</li>
                    <li class="list-group-item">Usage data (IP address, browser type, pages visited, etc.)</li>
                </ul>

                <h3 class="mt-4 text-secondary section-title">How We Use Your Information</h3>
                <p class="text-muted">
                    We use the information we collect for various purposes, including:
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">To provide and maintain our service</li>
                    <li class="list-group-item">To notify you about changes to our service</li>
                    <li class="list-group-item">To provide customer support</li>
                    <li class="list-group-item">To monitor the usage of our service</li>
                    <li class="list-group-item">To detect, prevent, and address technical issues</li>
                </ul>

                <h3 class="mt-4 text-secondary section-title">Data Protection</h3>
                <p class="text-muted">
                    We are committed to ensuring that your information is secure. To prevent unauthorized access or disclosure, we have put in place suitable physical, electronic, and managerial procedures to safeguard and secure the information we collect online.
                </p>

                <h3 class="mt-4 text-secondary section-title">Third-Party Services</h3>
                <p class="text-muted">
                    We may employ third-party companies and individuals to facilitate our service, provide the service on our behalf, or assist us in analyzing how our service is used. These third parties have access to your personal information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.
                </p>

                <h3 class="mt-4 text-secondary section-title">Changes to This Privacy Policy</h3>
                <p class="text-muted">
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.
                </p>

                <h3 class="mt-4 text-secondary section-title">Contact Us</h3>
                <p class="text-muted">
                    If you have any questions about this Privacy Policy, please contact us at:
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Email: support@example.com</li>
                    <li class="list-group-item">Phone: +123-456-7890</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Include JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>