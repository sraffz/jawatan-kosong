            {{-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="nav-link-text ms-2 ps-1">Dashboards</span>
          </a>
          <div class="collapse " id="dashboardsExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/dashboards/analytics.html">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Analytics </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/dashboards/discover.html">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Discover </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/dashboards/sales.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sales </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/dashboards/automotive.html">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Automotive </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/dashboards/smart-home.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Smart Home </span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}
        
            <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">PAGES</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white active" aria-controls="pagesExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
            <span class="nav-link-text ms-2 ps-1">Pages</span>
          </a>
          <div class="collapse  show " id="pagesExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Profile <b class="caret"></b></span>
                </a>
                <div class="collapse " id="profileExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/overview.html">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Profile Overview </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/projects.html">
                        <span class="sidenav-mini-icon"> A </span>
                        <span class="sidenav-normal  ms-2  ps-1"> All Projects </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/messages.html">
                        <span class="sidenav-mini-icon"> M </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Messages </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                  <span class="sidenav-mini-icon"> U </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Users <b class="caret"></b></span>
                </a>
                <div class="collapse " id="usersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/users/reports.html">
                        <span class="sidenav-mini-icon"> R </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Reports </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/users/new-user.html">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New User </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white  active " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Account <b class="caret"></b></span>
                </a>
                <div class="collapse show" id="accountExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white active" href="../../../pages/pages/account/settings.html">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Settings </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/billing.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Billing </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/invoice.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Invoice </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/security.html">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Security </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Projects <b class="caret"></b></span>
                </a>
                <div class="collapse " id="projectsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/general.html">
                        <span class="sidenav-mini-icon"> G </span>
                        <span class="sidenav-normal  ms-2  ps-1"> General </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/timeline.html">
                        <span class="sidenav-mini-icon"> T </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Timeline </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/new-project.html">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Project </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                  <span class="sidenav-mini-icon"> V </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Virtual Reality <b class="caret"></b></span>
                </a>
                <div class="collapse " id="vrExamples">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/vr/vr-default.html">
                        <span class="sidenav-mini-icon"> V </span>
                        <span class="sidenav-normal  ms-2  ps-1"> VR Default </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/vr/vr-info.html">
                        <span class="sidenav-mini-icon"> V </span>
                        <span class="sidenav-normal  ms-2  ps-1"> VR Info </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/pricing-page.html">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Pricing Page </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/rtl-page.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal  ms-2  ps-1"> RTL </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/widgets.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Widgets </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/charts.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Charts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/sweet-alerts.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sweet Alerts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/notifications.html">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Notifications </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
            <span class="nav-link-text ms-2 ps-1">Applications</span>
          </a>
          <div class="collapse " id="applicationsExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/crm.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/kanban.html">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Kanban </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/wizard.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Wizard </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/datatables.html">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal  ms-2  ps-1"> DataTables </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/calendar.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Calendar </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/stats.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Stats </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
            <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
          </a>
          <div class="collapse " id="ecommerceExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Products <b class="caret"></b></span>
                </a>
                <div class="collapse " id="productsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/products/new-product.html">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/products/edit-product.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Edit Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/products/product-page.html">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Product Page </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/products/products-list.html">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                  <span class="sidenav-mini-icon"> O </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
                </a>
                <div class="collapse " id="ordersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/orders/list.html">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/orders/details.html">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/ecommerce/referral.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Referral </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white " aria-controls="authExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
            <span class="nav-link-text ms-2 ps-1">Authentication</span>
          </a>
          <div class="collapse " id="authExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signinExample">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Log Masuk <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signinExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signin/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signin/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signin/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sign Up <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#resetExample">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Reset Password <b class="caret"></b></span>
                </a>
                <div class="collapse " id="resetExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/reset/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/reset/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/reset/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Lock <b class="caret"></b></span>
                </a>
                <div class="collapse " id="lockExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#StepExample">
                  <span class="sidenav-mini-icon"> 2 </span>
                  <span class="sidenav-normal  ms-2  ps-1"> 2-Step Verification <b class="caret"></b></span>
                </a>
                <div class="collapse " id="StepExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#errorExample">
                  <span class="sidenav-mini-icon"> E </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Error <b class="caret"></b></span>
                </a>
                <div class="collapse " id="errorExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/error/404.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Error 404 </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/error/500.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Error 500 </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>