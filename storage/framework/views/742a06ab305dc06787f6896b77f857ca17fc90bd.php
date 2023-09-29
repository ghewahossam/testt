<aside id="sidebar" class="sidebar">


    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo e(!(Route::currentRouteName() == 'home') ? 'collapsed' : ''); ?>"
                href="<?php echo e(route('home')); ?>">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <?php if(Auth::user()->isDoctor()): ?>


            <li class="nav-item">
                <a class="nav-link <?php echo e(!in_array(Route::currentRouteName(), ['user_list', 'user_createnew', 'user_update']) ? 'collapsed' : ''); ?>"
                    data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav"
                    class="nav-content collapse <?php echo e(in_array(Route::currentRouteName(), ['user_list', 'user_createnew', 'user_update']) ? 'show' : ''); ?>"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('user_list')); ?>"
                            class="<?php echo e(Route::currentRouteName() == 'user_list' ? 'active' : ''); ?>">
                            <i class="bi bi-circle"></i><span>View All</span>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link <?php echo e(!in_array(Route::currentRouteName(), ['appointment_list', 'appointment_createnew', 'appointment_update']) ? 'collapsed' : ''); ?>"
                    data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Appointments</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1"
                    class="nav-content collapse <?php echo e(in_array(Route::currentRouteName(), ['appointment_list', 'appointment_createnew', 'appointment_update']) ? 'show' : ''); ?>"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('appointment_list')); ?>"
                            class="<?php echo e(Route::currentRouteName() == 'appointment_list' ? 'active' : ''); ?>">
                            <i class="bi bi-circle"></i><span>View All</span>
                        </a>
                    </li>

                </ul>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link <?php echo e(!(Route::currentRouteName() == 'Calender') ? 'collapsed' : ''); ?>" href="<?php echo e(route('Calender')); ?>">

                <span>Calender</span>
            </a>
        </li>


    </ul>

</aside>
<?php /**PATH C:\xampp\htdocs\غوى\clinicians\resources\views/Dashbord/layout/Sidebar.blade.php ENDPATH**/ ?>