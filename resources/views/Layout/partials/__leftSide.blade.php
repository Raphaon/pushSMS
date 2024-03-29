<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('customer')->customerName }} {{ session('customer')->customerSurname }}</div>
                    <div class="email">{{ session('customer')->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">chat</i>
                            <span>Messages</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('messages') }}">List</a>
                            </li>
                            <li>
                                <a href="{{ route('newMessage') }}">New Message</a>
                            </li>
                             <li>
                                <a href="{{ route('messages') }}">Historique</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Contacts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('repertoires') }}">Repertoires</a>
                            </li>
                            <li>
                                <a href="{{ route('newMessage') }}">Add Contacts</a>
                            </li>
                             <li>
                                <a href="{{ route('importContact') }}">Import Contacts</a>
                            </li>
                             
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cast</i>
                            <span>Broadcasting</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('messages') }}">New</a>
                            </li>
                            <li>
                                <a href="{{ route('newCampagne') }}">New Campagne</a>
                            </li>
                             
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Project</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('projects') }}">List</a>
                            </li>
                            <li>
                                <a href="{{ route('newProject') }}">New project</a>
                            </li>
        
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>RDV</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('newRDV') }}">New</a>
                            </li>
                            <li>
                                <a href="{{ route('newProject') }}">Search </a>
                            </li>
        
                        </ul>
                    </li>


                  <li>
                      <a href="http://">
                        <i class="material-icons">bug_report</i>
                        <span>Report a bug</span>
                      </a>
                  </li>


             




                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2035 <a href="javascript:void(0);"> PUSH SMS </a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>