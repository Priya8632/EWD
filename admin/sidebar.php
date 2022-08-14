        <!-- NAV -->
        <nav class=" bg-success absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
            <div class="flex flex-col justify-between h-full">
                <div class="p-4">
                    <!-- LOGO -->
                    <a class="flex items-center text-white space-x-4" href="">
                        <i class="fas fa-user-secret me-2" style="font-size:larger;"></i>
                        <span class="text-2xl font-bold">HEALTHCARE</span>
                    </a>
                    <hr>
                    <!-- NAV LINKS -->
                    <div class="py-4 text-gray-400 space-y-2">
                        <!-- BASIC LINK -->
                        <a href="dashboard.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                            <i class="fa-solid fa-house-user" style="font-size:larger;"></i>
                            <span>Home</span>
                        </a>
                        <a href="appointments.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                            <i class="fa-solid fa-clipboard-user me-2" style="font-size:large;"></i>
                            <span>Appointments</span>
                        </a>
                        <!-- DROPDOWN LINK -->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open" class="flex items-center text-white justify-between cursor-pointer py-2.5 px-4 rounded">
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-user-doctor me-2" style="font-size:larger;"></i>
                                    <span>Doctor</span>
                                </div>
                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                </svg>
                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                                <a href="doctor.php" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                    Profile
                                </a>
                                <a href="specialization.php" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                    Specialization
                                </a>
                            </div>
                        </div>

                        <a href="patient.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                            <i class="fa-solid fa-bed me-2" style="font-size:large;"></i>
                            <span>Patients</span>
                        </a>
                        <a href="profile.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                            <i class="fa-solid fa-user me-2" style="font-size:large;"></i>
                            <span>Profile</span>
                        </a>
                        <a href="admin_logout.php" class="block py-2.5 px-4 flex items-center space-x-2  text-white rounded">
                            <i class="fas fa-project-diagram me-2" style="font-size:large;"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </div>
            </div>
        </nav>
        <!-- END OF NAV -->