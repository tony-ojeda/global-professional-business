var sidebarFileManager=$(".sidebar-file-manager"),sidebarToggler=$(".file-manager-toggler"),fileManagerOverlay=$(".file-manager-content-overlay"),sidebarRight=$(".right-sidebar");if($(".list").length>0)var sidebarLeftList=new PerfectScrollbar(".list",{suppressScrollX:!0});if($(".file-manager-main-content .right-sidebar").length>0)var rightsidebar=new PerfectScrollbar(".file-manager-main-content .right-sidebar .card-body",{suppressScrollX:!0,wheelPropagation:!1});if($(".file-manager-main-content").length>0)var rightContentWrapper=new PerfectScrollbar(".file-manager-main-content .bottom-content",{cancelable:!0,wheelPropagation:!1});sidebarToggler.on("click",function(){sidebarFileManager.toggleClass("show"),fileManagerOverlay.toggleClass("show")}),$(".file-manager-content-overlay, .sidebar-close-icon").on("click",function(){sidebarFileManager.removeClass("show"),fileManagerOverlay.removeClass("show"),sidebarRight.removeClass("show")}),$(".folder-info, .files-info").on("click",function(e){e.target.classList.contains("icon-more-vertical")||e.target.classList.contains("media-object")||(sidebarRight.addClass("show"),fileManagerOverlay.addClass("show"))}),$("#data-list-view tbody > tr").on("click",function(e){e.target.classList.contains("icon-more-vertical")||(sidebarRight.addClass("show"),fileManagerOverlay.addClass("show"))}),$(window).on("resize",function(){$(window).width()>768&&fileManagerOverlay.hasClass("show")&&(sidebarFileManager.removeClass("show"),fileManagerOverlay.removeClass("show"),sidebarRight.removeClass("show"))}),$(".file-manager-application .sidebar-menu-list .list-group a").on("click",function(){$(".file-manager-application .sidebar-menu-list .list-group a").hasClass("active")&&$(".file-manager-application .sidebar-menu-list .list-group a").removeClass("active"),$(this).addClass("active")});var dataListView=$(".data-list-view").DataTable({responsive:!1,scrollCollapse:!0,paging:!1,searching:!1,ordering:!1,select:!0,info:!1,select:{style:"single"}});