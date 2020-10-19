<li class="{!!request()->is('/')?'active':''!!}">
  <a href="{{ route('admin.dashboard') }}">
    <i class="menu-icon fa fa-tachometer"></i>
    <span class="menu-text"> Dashboard </span>
  </a>
  <b class="arrow"></b>
</li>

<li class="{!! request()->is('admin/roles*')?'active open':'' !!}">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Manage Roles </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="{!! request()->is('admin/roles/create')?'active open':'' !!}">
      <a href="{{ route('admin.roles.create') }}">
        <i class="menu-icon fa fa-plus"></i>
        Add Role
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/roles')?'active open':'' !!}">
      <a href="{{ route('admin.roles.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Roles List
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li>

<li class="{!! request()->is('admin/permissions*')?'active open':'' !!}">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Manage Permissions </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="{!! request()->is('admin/permissions/create')?'active open':'' !!}">
      <a href="{{ route('admin.permissions.create') }}">
        <i class="menu-icon fa fa-plus"></i>
        Add Permission
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/permissions')?'active open':'' !!}">
      <a href="{{ route('admin.permissions.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Permissions List
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li>

<li class="{!! request()->is('admin/users*')?'active open':'' !!}">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Manage Users </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="{!! request()->is('admin/users/create')?'active open':'' !!}">
      <a href="{{ route('admin.users.create') }}">
        <i class="menu-icon fa fa-plus"></i>
        Add User
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/users')?'active open':'' !!}">
      <a href="{{ route('admin.users.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Users List
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li>

{{-- agent route sidebar --}}
{{-- <li class="{!! request()->is('admin/agent*')?'active open':'' !!}">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text">Agent Management </span>
      <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
      <li class="{!! request()->is('admin/agent/create')?'active open':'' !!}">
        <a href="{{ route('admin.agent.create') }}">
          <i class="menu-icon fa fa-plus"></i>
          Add Agent
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/agent/list')?'active open':'' !!}">
        <a href="{{ route('admin.agent.list') }}">
          <i class="menu-icon fa fa-eye"></i>
          Agents List
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/agent/agentChart')?'active open':'' !!}">
        <a href="{{ route('admin.agent.chart') }}">
          <i class="menu-icon fa fa-eye"></i>
          Agents Chart
        </a>
        <b class="arrow"></b>
      </li>
    </ul>
</li> --}}

{{-- Category route sidebar --}}
<li class="{!! request()->is('admin/categories*')?'active open':'' !!}">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> Manage Categories </span>
      <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
      <li class="{!! request()->is('admin/categories/create')?'active open':'' !!}">
        <a href="{{ route('admin.categories.create') }}">
          <i class="menu-icon fa fa-plus"></i>
          Add Category
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/categories')?'active open':'' !!}">
        <a href="{{ route('admin.categories.index') }}">
          <i class="menu-icon fa fa-eye"></i>
          Category List
        </a>
        <b class="arrow"></b>
      </li>
    </ul>
</li>

{{-- property route sidebar --}}
<li class="{!! request()->is('admin/properties*')?'active open':'' !!}">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> Manage Properties </span>
      <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
      <li class="{!! request()->is('admin/properties/create')?'active open':'' !!}">
        <a href="{{ route('admin.properties.create') }}">
          <i class="menu-icon fa fa-plus"></i>
          Add Property
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/properties')?'active open':'' !!}">
        <a href="{{ route('admin.properties.index') }}">
          <i class="menu-icon fa fa-eye"></i>
          Property List
        </a>
        <b class="arrow"></b>
      </li>
    </ul>
</li>

{{-- product route sidbar --}}
{{-- <li class="{!! request()->is('admin/products*')?'active open':'' !!}">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Manage Products </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="{!! request()->is('admin/products/create')?'active open':'' !!}">
      <a href="{{ route('admin.products.create') }}">
       <i class="menu-icon fa fa-plus"></i>
        Add Product
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/products')?'active open':'' !!}">
      <a href="{{ route('admin.products.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Product List
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li> --}}

{{-- <li class="{!!request()->is('admin/activitylogs*')?'active open':''!!}">
  <a href="{{route('admin.activitylogs.index')}}">
    <i class="menu-icon fa fa-tachometer"></i>
    <span class="menu-text"> ActivityLogs </span>
  </a>
  <b class="arrow"></b>
</li> --}}
{{-- setting sidbar --}}
<li class="{!! request()->is('admin/settings*')?'active open':'' !!}">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Manage Settings </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="{!! request()->is('admin/settings/general/*')?'active open':'' !!}">
      <a href="{{ route('admin.general.edit') }}">
       <i class="menu-icon fa fa-plus"></i>
        General Setting
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/settings/create')?'active open':'' !!}">
      <a href="{{ route('admin.settings.create') }}">
       <i class="menu-icon fa fa-plus"></i>
        Add Setting
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/settings')?'active open':'' !!}">
      <a href="{{ route('admin.settings.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Settings List
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/settings/sendemail')?'active open':'' !!}">
      <a href="{{ route('admin.mails.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Send Mail
      </a>
      <b class="arrow"></b>
    </li>
    <li class="{!! request()->is('admin/settings/translate')?'active open':'' !!}">
      <a href="{{ route('languages.index') }}">
        <i class="menu-icon fa fa-eye"></i>
        Languages Translator
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li>

{{-- Report route sidebar --}}
<li class="{!! request()->is('admin/report*')?'active open':'' !!}">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> Manage Reports </span>
      <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
      <li class="{!! request()->is('admin/report/agent')?'active open':'' !!}">
        <a href="{{ route('admin.report.agent') }}">
          <i class="menu-icon fa fa-plus"></i>
          Agents Report
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/report/property')?'active open':'' !!}">
        <a href="{{ route('admin.report.property') }}">
          <i class="menu-icon fa fa-eye"></i>
          Properties Report
        </a>
        <b class="arrow"></b>
      </li>
      <li class="{!! request()->is('admin/report/agent/management')?'active open':'' !!}">
        <a href="{{ route('admin.agent.chart') }}">
          <i class="menu-icon fa fa-eye"></i>
          Agents Chart
        </a>
        <b class="arrow"></b>
      </li>
    </ul>
</li>

{{-- other sidebar --}}
<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-desktop"></i>
    <span class="menu-text">
      Menu &amp; UI
    </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-caret-right"></i>
        Layouts
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="top-menu.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Top Menu
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="two-menu-1.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Two Menus 1
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="two-menu-2.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Two Menus 2
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="mobile-menu-1.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Default Mobile Menu
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="mobile-menu-2.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Mobile Menu 2
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="mobile-menu-3.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Mobile Menu 3
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <li class="">
      <a href="typography.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Typography
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="elements.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Elements
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="buttons.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Buttons &amp; Icons
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="content-slider.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Content Sliders
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="treeview.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Treeview
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="jquery-ui.html">
        <i class="menu-icon fa fa-caret-right"></i>
        jQuery UI
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="nestable-list.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Nestable Lists
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-caret-right"></i>

        Three Level Menu
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="#">
            <i class="menu-icon fa fa-leaf green"></i>
            Item #1
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil orange"></i>

            4th level
            <b class="arrow fa fa-angle-down"></b>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">
            <li class="">
              <a href="#">
                <i class="menu-icon fa fa-plus purple"></i>
                Add Product
              </a>
              <b class="arrow"></b>
            </li>
            <li class="">
              <a href="#">
                <i class="menu-icon fa fa-eye pink"></i>
                View Products
              </a>
              <b class="arrow"></b>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</li>

{{-- <li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> Tables </span>
    <b class="arrow fa fa-angle-down"></b>
  </a>
  <b class="arrow"></b>
  <ul class="submenu">
    <li class="">
      <a href="tables.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Simple &amp; Dynamic
      </a>
      <b class="arrow"></b>
    </li>
    <li class="">
      <a href="jqgrid.html">
        <i class="menu-icon fa fa-caret-right"></i>
        jqGrid plugin
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
</li>

<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-pencil-square-o"></i>
    <span class="menu-text"> Forms </span>

    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">
    <li class="">
      <a href="form-elements.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Form Elements
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="form-elements-2.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Form Elements 2
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="form-wizard.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Wizard &amp; Validation
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="wysiwyg.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Wysiwyg &amp; Markdown
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="dropzone.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Dropzone File Upload
      </a>

      <b class="arrow"></b>
    </li>
  </ul>
</li>

<li class="">
  <a href="widgets.html">
    <i class="menu-icon fa fa-list-alt"></i>
    <span class="menu-text"> Widgets </span>
  </a>

  <b class="arrow"></b>
</li>

<li class="">
  <a href="calendar.html">
    <i class="menu-icon fa fa-calendar"></i>

    <span class="menu-text">
      Calendar

      <span class="badge badge-transparent tooltip-error" title="2 Important Events">
        <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
      </span>
    </span>
  </a>

  <b class="arrow"></b>
</li>

<li class="">
  <a href="gallery.html">
    <i class="menu-icon fa fa-picture-o"></i>
    <span class="menu-text"> Gallery </span>
  </a>

  <b class="arrow"></b>
</li>

<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-tag"></i>
    <span class="menu-text"> More Pages </span>

    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">
    <li class="">
      <a href="profile.html">
        <i class="menu-icon fa fa-caret-right"></i>
        User Profile
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="inbox.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Inbox
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="pricing.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Pricing Tables
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="invoice.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Invoice
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="timeline.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Timeline
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="search.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Search Results
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="email.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Email Templates
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="login.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Login &amp; Register
      </a>

      <b class="arrow"></b>
    </li>
  </ul>
</li>

<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-file-o"></i>

    <span class="menu-text">
      Other Pages

      <span class="badge badge-primary">5</span>
    </span>

    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">
    <li class="">
      <a href="faq.html">
        <i class="menu-icon fa fa-caret-right"></i>
        FAQ
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="error-404.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Error 404
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="error-500.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Error 500
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="grid.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Grid
      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="blank.html">
        <i class="menu-icon fa fa-caret-right"></i>
        Blank Page
      </a>

      <b class="arrow"></b>
    </li>
  </ul>
</li> --}}
