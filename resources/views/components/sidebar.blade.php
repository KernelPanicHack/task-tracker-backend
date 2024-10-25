<nav id="sidebar" >
    <style>
    #sidebar {
    height: 100%;
    border-right: 1px solid rgba(var(--border-alpha));
    color: #fff;
    transition: all 0.3s;
    font-size: 120%;
    }
    .nav-item ul {
        padding-left: 1rem;
    }
    .show{
        margin-left: 10px; /* Смещение границы влево */
        border-left: 1.5px solid rgba(var(--dark-600, 1));

    }
    #sidebar.active {
    margin-left: -250px;
    }
    #sidebar ul i {
        color: rgba(var(--primary),1);
    }



    #sidebar ul li a {
    font-size: 1.1em;
    display: block;
    }

    #sidebar ul li a:hover {
    background: rgba(226, 232, 240,0.1) !important;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
    color: #fff;

    }

    a[data-toggle="collapse"] {
    position: relative;
    }

    .dropdown-toggle::after {
    display: inline-block;
    width: 0;
    height: 0;

    transform: translateY(-50%);


    }

    ul ul a {
    font-size: 0.9em !important;
    padding-left: 2rem ;
    background: #6d7fcc;
    }




    a.download {
    background: #fff;
    color: #7386D5;
    }

    a.article,
    a.article:hover {
    background: rgba(226, 232, 240,1) !important;
    }

    /* ---------------------------------------------------
    CONTENT STYLE
    ----------------------------------------------------- */
    .content{
    width: 80%;
    justify-content: center;
    height: 100%;
    }


    /* ---------------------------------------------------
    MEDIAQUERIES
    ----------------------------------------------------- */
    @media (max-width: 993px) {
        #sidebar {

            padding: 0;
        }
        .hide-text {
            display: none;
            visibility: hidden;
        }
        #sidebar .nav {
            padding: 2rem;
            width: 100%;
        }
        .nav-item {
            justify-items: center;
        }
        #sidebar ul li a {
            display: flex;
            justify-content: center;
        }
        .list-group-item a {

            padding: 2rem !important;
        }
        .dropdown-toggle::after,dropdown-toggle,.dropdown-toggle::before{
            display: none;
        }
        #sidebar i.bi.bi-gear {

            padding: 0 5px 0 5px;
            /*background-color: rgba(var(--primary),0.2);*/
            border-bottom: 1px solid rgba(var(--border), 0.5);

        }
        .nav-item ul {
            padding-left: 0;
        }
        .show{
            margin-left: 0; /* Смещение границы влево */
            border: none;

        }
    }

    </style>
    <ul class="nav flex-column p-4">
        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action active" style="color: white">
                <i class="bi bi-person"></i>
                <span class="hide-text">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <i class="bi bi-gear"></i>
                <span class="hide-text">Settings</span>
            </a>
            <ul class="collapse list-unstyled show" id="homeSubmenu">
                <li class="nav-item">
                    <a href="{{ route('admin.roles') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-gear"></i>
                        <span class="hide-text">Manage Roles and Permissions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.list-roles-permissions') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-view-stacked"></i>
                        <span class="hide-text">View Roles and Permissions</span>
                    </a>
                </li>
            </ul>

        </li>
    </ul>
</nav>
