<?php
session_start();
$loggedIn = isset($_COOKIE['flag']) && isset($_SESSION['user_role']);
$role = $loggedIn ? $_SESSION['user_role'] : null;
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Organ Link</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" />
  <link rel="icon" type="image/x-icon" href="/Assets/heartlogo.png" />
</head>

<body
  class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen flex flex-col min-h-screen">
  <!-- Header -->
  <header
    class="p-5 bg-white shadow-md flex justify-between items-center relative">
    <a href="/index.html">
      <img class="w-32" src="/Assets/DonorLink Logo.png" alt="Logo" />
    </a>

    <!-- Mobile Menu Button -->
    <button
      id="menu-btn"
      class="block md:hidden text-gray-700 focus:outline-none">
      <svg
        class="w-8 h-8"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
    </button>

    <!-- Navigation Menu -->
    <nav id="menu" class="hidden md:flex space-x-4 items-center">
      <ul
        class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 text-center md:text-left">
        <li><a href="/index.html" class="btn btn-primary">Home</a></li>
        <li>
          <a href="/donorReg/donorReg.html" class="btn btn-outline">Donor Registration</a>
        </li>
        <li>
          <a href="/OrganReg/organReg.html" class="btn btn-outline">Organ Registration</a>
        </li>
        <li>
          <a href="/Explore/index.html" class="btn btn-outline">Explore</a>
        </li>
        <li>
          <a href="/Research/research.html" class="btn btn-outline">Research</a>
        </li>
      </ul>
    </nav>

    <!-- Login & Signup Buttons -->
    <div class="hidden md:flex space-x-2">
      <?php if ($loggedIn): ?>
        <!-- <span class="btn btn-disabled">Logged in as <strong><?php echo $username; ?></strong></span> -->
        <a href="controller/logoutCheck.php"><button class="btn btn-secondary">Logout</button></a>
      <?php else: ?>
        <a href="views/login/login.html"><button class="btn btn-secondary">Login</button></a>
        <a href="views/signup/signup.html"><button class="btn btn-accent">Sign Up</button></a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-blue-900 text-white text-center p-10">
    <h1 class="text-3xl md:text-5xl font-bold">
      Donate an Organ, Save a Life
    </h1>
    <p class="mt-4 text-lg">
      Your decision to donate can change someone's life forever.
    </p>
    <a href="#" class="btn btn-primary mt-4">Learn More</a>
  </section>

  <!-- Main Content -->
  <main class="container mx-auto my-10 p-4 flex-grow">
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="card bg-blue-900 text-white p-4 rounded-lg shadow-lg">
        <img
          src="/Assets/h-1.png"
          alt="Organ Donation"
          class="rounded-t-lg w-full" />
        <h2 class="text-xl font-bold mt-2">What is Organ Donation?</h2>
        <p class="mt-2 text-sm">
          Learn how organ donation works and its impact on lives.
        </p>
      </div>
      <div class="card bg-blue-900 text-white p-4 rounded-lg shadow-lg">
        <img
          src="/Assets/h-2.png"
          alt="How does it work?"
          class="rounded-t-lg w-full" />
        <h2 class="text-xl font-bold mt-2">How Does it Work?</h2>
        <p class="mt-2 text-sm">
          Understand the process of organ donation step by step.
        </p>
      </div>
      <div class="card bg-blue-900 text-white p-4 rounded-lg shadow-lg">
        <img
          src="/Assets/h-3.png"
          alt="Who Can Donate?"
          class="rounded-t-lg w-full" />
        <h2 class="text-xl font-bold mt-2">Who Can Donate?</h2>
        <p class="mt-2 text-sm">
          Find out if you are eligible to donate an organ.
        </p>
      </div>
    </section>
    <div class="text-center my-6">
      <button class="btn btn-primary">Read More</button>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center p-4 mt-auto">
    <p>&copy; 2025 Donor Link - Donate Organ, Save Life</p>
  </footer>

  <script src="/Js/index.js"></script>
</body>

</html>