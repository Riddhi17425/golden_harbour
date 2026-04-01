<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
<style>
h2, a {
  margin: 0;
  padding: 0;
  text-decoration: none;
  margin-block-start: 20px;
  margin-block-end: 20px;
}

.section {
    width: 50%;
    margin: 0 auto;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.section .error {
  font-size: 60px;
  color: #b30000; /* Changed from blue to red */
  font-family: "Poppins", sans-serif;
  text-align: center;
}

.page {
  font-size: 20px;
  font-weight: 600;
  font-family: "Poppins", sans-serif;
  color: #666;
  text-align: center;
}

.back-home {
  display: inline-block;
  border: 2px solid #b30000; /* Changed from blue to red */
  color: #b30000; /* Changed from blue to red */
  text-transform: uppercase;
  font-weight: 600;
  padding: 0.75rem 1rem 0.6rem;
  transition: all 0.2s linear;
  box-shadow: 0 15px 15px -11px rgba(0, 0, 0, 0.4);
  background: #b3000000; /* Transparent red background */
  border-radius: 6px;
}

.back-home:hover {
  background: #b30000; /* Red background on hover */
  color: #fff; /* White text on hover */
  text-align: center;
}
</style>
</head>
<body>
    <div class="section">
        <h2 class="error">404</h2>
        <div class="page">The page you are looking for no longer exists. Visit our Home page to continue browsing.</div>
        <div class="page">
            <a class="back-home" href="{{ url('/') }}">Back to home</a>
        </div>
    </div>
</body>
</html>
