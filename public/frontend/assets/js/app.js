/*
Version: 5.2.0
Template: SocialV - Responsive Bootstrap 5 Admin Dashboard Template
Author: iqonicthemes.in
Design and Developed by: iqonicthemes.in
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: LoaderInit
:: Tooltip
:: range Button 
:: right-sidebar
:: Sticky-Nav
:: Sidebar Toggle
:: Sidebar Left Active Border
:: Scrollbar
:: ColorChange Mode
:: Progress Bar
:: Inline Flatpickr
:: Search input
:: chat
:: todo
:: checkout
:: page-loader
:: Mailbox
:: Confirm Button
:: Select input
:: Fieldset
:: Vanila Datepicker
:: Form Validation
:: Form Wizard-validate
:: calender
:: weather
:: Editable Table
:: Resize Plugins
:: DOMContentLoaded
:: Window Resize


------------------------------------------------
Index Of Script
----------------------------------------------*/

(function (jQuery) {
  ("use strict");
  /*------------LoaderInit----------------*/
  const loaderInit = () => {
    const loader = document.querySelector(".loader");
    if (loader !== null) {
      loader.classList.add("animate__animated", "animate__fadeOut");
      setTimeout(() => {
        loader.classList.add("d-none");
      }, 200);
    }
  };
  jQuery(document).ready(function () {
    /*---------------------------------------------------------------------
    Tooltip
    -----------------------------------------------------------------------*/
    jQuery('[data-bs-toggle="popover"]').popover();
    jQuery('[data-bs-toggle="tooltip"]').tooltip();

    /*---------------------------------------------------------------------
    range Button 
    -----------------------------------------------------------------------*/
    function wcqib_refresh_quantity_increments() {
      jQuery(
        "div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)"
      ).each(function (a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"),
          c
            .children()
            .first()
            .before('<input type="button" value="-" class="minus" />'),
          c
            .children()
            .last()
            .after('<input type="button" value="+" class="plus" />');
      });
    }
    String.prototype.getDecimals ||
      (String.prototype.getDecimals = function () {
        var a = this,
          b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b
          ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0))
          : 0;
      }),
      jQuery(document).ready(function () {
        wcqib_refresh_quantity_increments();
      }),
      jQuery(document).on("updated_wc_div", function () {
        wcqib_refresh_quantity_increments();
      }),
      jQuery(document).on("click", ".plus, .minus", function () {
        var a = jQuery(this).closest(".quantity").find(".qty"),
          b = parseFloat(a.val()),
          c = parseFloat(a.attr("max")),
          d = parseFloat(a.attr("min")),
          e = a.attr("step");
        (b && "" !== b && "NaN" !== b) || (b = 0),
          ("" !== c && "NaN" !== c) || (c = ""),
          ("" !== d && "NaN" !== d) || (d = 0),
          ("any" !== e &&
            "" !== e &&
            void 0 !== e &&
            "NaN" !== parseFloat(e)) ||
            (e = 1),
          jQuery(this).is(".plus")
            ? c && b >= c
              ? a.val(c)
              : a.val((b + parseFloat(e)).toFixed(e.getDecimals()))
            : d && b <= d
            ? a.val(d)
            : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())),
          a.trigger("change");
      });
       /*------------Minus-plus--------------*/
  const plusBtns = document.querySelectorAll('.iq-quantity-plus')
  const minusBtns = document.querySelectorAll('.iq-quantity-minus')
  const updateQtyBtn = (elem, value) => {
    const oldValue = elem.closest('[data-qty="btn"]').querySelector('[data-qty="input"]').value
    const newValue = Number(oldValue) + Number(value)
    if (newValue >= 1) {
      elem.closest('[data-qty="btn"]').querySelector('[data-qty="input"]').value = newValue
    }
  }
  Array.from(plusBtns, (elem) => {
    elem.addEventListener('click', (e) => {
      updateQtyBtn(elem, 1)
    })
  })
  Array.from(minusBtns, (elem) => {
    elem.addEventListener('click', (e) => {
      updateQtyBtn(elem, -1)
    })
  })
    /*---------------------------------------------------------------------
        right-sidebar
    -----------------------------------------------------------------------*/
    !(function (e) {
      "use strict";

      function t(t) {
        t
          ? e(".right-sidebar-mini").addClass("right-sidebar")
          : e(".right-sidebar-mini").removeClass("right-sidebar");
        t
          ? e("body").addClass("right-sidebar-close")
          : e("body").removeClass("right-sidebar-close");
      }
      e(document).ready(function () {
        var a = !1;
        t(a),
          e(document).on("click", ".right-sidebar-toggle", function () {
            t((a = !a));
          });
      });
    })(jQuery);

    /*---------------------------------------------------------------------
       Sidebar Toggle
    -----------------------------------------------------------------------*/
    function updateSidebarType() {
      if (typeof IQSetting !== typeof undefined) {
        const sidebarType = IQSetting.options.setting.sidebar_type.value;
        const newTypes = sidebarType;
        if (sidebarType.includes("sidebar-mini")) {
          const indexOf = newTypes.findIndex((x) => x == "sidebar-mini");
          newTypes.splice(indexOf, 1);
        } else {
          newTypes.push("sidebar-mini");
        }
        IQSetting.sidebar_type(newTypes);
      }
    }
    const sidebarToggle = (elem) => {
      elem.addEventListener("click", (e) => {
        const sidebar = document.querySelector(".sidebar");
        if (sidebar.classList.contains("sidebar-mini")) {
          sidebar.classList.remove("sidebar-mini");
          updateSidebarType();
        } else {
          sidebar.classList.add("sidebar-mini");
          updateSidebarType();
        }
        const sidebarMini = document.getElementsByTagName("ASIDE")[0];
    if (sidebarMini.classList.contains('sidebar-mini')) {
      sidebarMini.classList.remove('sidebar-mini')
    }
    else {
      sidebarMini.classList.add('sidebar-mini')
    }
      });
    };
    jQuery(document).on("click", '[data-toggle="sidebar"]', function () {
      jQuery("body").toggleClass("sidebar-main");
      jQuery(this).toggleClass("mini");
    });
    const sidebarToggleBtn = document.querySelectorAll(
      '[data-toggle="sidebar"]'
    );
    const sidebar = document.querySelector('[data-toggle="main-sidebar"]');
    if (sidebar !== null) {
      const sidebarActiveItem = sidebar.querySelectorAll(".active");
      Array.from(sidebarActiveItem, (elem) => {
        elem.classList.add("active");
        if (!elem.closest("ul").classList.contains("iq-main-menu")) {
          const childMenu = elem.closest("ul");
          const parentMenu = childMenu.closest("li").querySelector(".nav-link");
          parentMenu.classList.add("active");
          new bootstrap.Collapse(childMenu, {
            toggle: true,
          });
        }
      });
    }
    Array.from(sidebarToggleBtn, (sidebarBtn) => {
      sidebarToggle(sidebarBtn);
    });

    /*---------------------------------------------------------------------
                Sidebar Left Active Border
    -----------------------------------------------------------------------*/
    window.addEventListener("load", () => {
      const leftSidebar = document.querySelector(
        '[data-toggle="main-sidebar"]'
      );
      if (leftSidebar !== null) {
        const collapseElementList = [].slice.call(
          leftSidebar.querySelectorAll(".collapse")
        );
        const collapseList = collapseElementList.map(function (collapseEl) {
          collapseEl.addEventListener("show.bs.collapse", function (elem) {
            collapseEl.closest("li").classList.add("active");
          });
          collapseEl.addEventListener("hidden.bs.collapse", function (elem) {
            collapseEl.closest("li").classList.remove("active");
          });
        });

        const active = leftSidebar.querySelector(".active");
        if (active !== null) {
          active.closest("li").classList.add("active");
        }
      }
    });

    /*---------------------------------------------------------------------
        Scrollbar
    -----------------------------------------------------------------------*/
    let Scrollbar;
    if (typeof Scrollbar !== typeof null) {
      if (document.querySelectorAll(".data-scrollbar").length) {
        Scrollbar = window.Scrollbar;
        Scrollbar.init(document.querySelector(".data-scrollbar"), {
          continuousScrolling: false,
        });
      }
    }
    /*---------------------------------------------------------------------
         ColorChange Mode
    -----------------------------------------------------------------------*/
    const customizerMode = (custombodyclass, colors, colorInfo) => {
      document.querySelector("body").classList.add(`${custombodyclass}`);
      sessionStorage.setItem(
        "colorcustomchart-mode",
        getComputedStyle(document.body).getPropertyValue("--bs-primary")
      );
      document.documentElement.style.setProperty("--bs-info", colors);
      const color = sessionStorage.getItem("colorcustomchart-mode");
      if (color !== "null" && color !== undefined && color !== "") {
        const event = new CustomEvent("ColorChange", {
          detail: { detail1: color.trim(), detail2: colors.trim() },
        });
        document.dispatchEvent(event);
      } else {
        const event = new CustomEvent("ColorChange", {
          detail: { detail1: colorInfo.trim(), detail2: colors.trim() },
        });
        document.dispatchEvent(event);
      }
      const elements = document.querySelectorAll(
        '[data-setting="color-mode1"][data-name="color"]'
      );
      Array.from(elements, (mode) => {
        const colorclass = mode.getAttribute("data-value");
        if (colorclass === custombodyclass) {
          mode.classList.add("active");
        } else {
          mode.classList.remove("active");
        }
      });
    };
    const elements = document.querySelectorAll(
      '[data-setting="color-mode1"][data-name="color"]'
    );
    Array.from(elements, (mode) => {
      mode.addEventListener("click", (e) => {
        Array.from(elements, (el) => {
          el.classList.remove("active");
          document
            .querySelector("body")
            .classList.remove(el.getAttribute("data-value"));
        });
        sessionStorage.setItem(
          "colorcustom-mode",
          mode.getAttribute("data-value")
        );
        sessionStorage.setItem(
          "colorcustominfo-mode",
          mode.getAttribute("data-info")
        );

        mode.classList.add("active");
        const colors = mode.getAttribute("data-info");
        const color = getComputedStyle(document.body).getPropertyValue(
          "--bs-primary"
        );
        customizerMode(mode.getAttribute("data-value"), colors, color);
      });
    });
    const custombodyclass = sessionStorage.getItem("colorcustom-mode");
    const colors = sessionStorage.getItem("colorcustominfo-mode");
    const color = sessionStorage.getItem("colorcustomchart-mode");
    if (
      custombodyclass !== null &&
      custombodyclass !== undefined &&
      colors !== null &&
      colors !== undefined
    ) {
      customizerMode(custombodyclass, colors, color);
    }
    /*---------------------------------------------------------------------
         Progress Bar
    -----------------------------------------------------------------------*/
    const progressBarInit = (elem) => {
      const currentValue = elem.getAttribute("aria-valuenow");
      elem.style.width = "0%";
      elem.style.transition = "width 2s";
      if (typeof Waypoint !== typeof undefined) {
        new Waypoint({
          element: elem,
          handler: function () {
            setTimeout(() => {
              elem.style.width = currentValue + "%";
            }, 100);
          },
          offset: "bottom-in-view",
        });
      }
    };
    const customProgressBar = document.querySelectorAll(
      '[data-toggle="progress-bar"]'
    );
    Array.from(customProgressBar, (elem) => {
      progressBarInit(elem);
    });

    /*---------------------------------------------------------------------
        Inline Flatpickr
    -----------------------------------------------------------------------*/
    const inline_flatpickr = document.querySelectorAll(".inline_flatpickr");
    Array.from(inline_flatpickr, (elem) => {
      if (typeof flatpickr !== typeof undefined) {
        flatpickr(elem, {
          inline: true,
          minDate: "today",
          dateFormat: "Y-m-d",
        });
      }
    });

    /*---------------------------------------------------------------------
    chatuser
    -----------------------------------------------------------------------*/
    jQuery(document).on("click", ".chat-head .chat-user-profile", function () {
      jQuery(this).parent().next().toggleClass("show");
    });
    jQuery(document).on("click", ".user-profile .close-popup", function () {
      jQuery(this).parent().parent().removeClass("show");
    });

    /*---------------------------------------------------------------------
    chatuser main
    -----------------------------------------------------------------------*/
    jQuery(document).on("click", ".chat-search .chat-profile", function () {
      jQuery(this).parent().next().toggleClass("show");
    });
    jQuery(document).on("click", ".user-profile .close-popup", function () {
      jQuery(this).parent().parent().removeClass("show");
    });

    /*---------------------------------------------------------------------
    Chat start
    -----------------------------------------------------------------------*/
    jQuery(document).on("click", "#chat-start", function () {
      jQuery(".chat-data-left").toggleClass("show");
    });
    jQuery(document).on("click", ".close-btn-res", function () {
      jQuery(".chat-data-left").removeClass("show");
    });
    jQuery(document).on("click", ".iq-chat-ui li", function () {
      jQuery(".chat-data-left").removeClass("show");
    });
    jQuery(document).on("click", ".sidebar-toggle", function () {
      jQuery(".chat-data-left").addClass("show");
    });

    /*---------------------------------------------------------------------
        todo Page
    -----------------------------------------------------------------------*/
    jQuery(document).on("click", ".todo-task-list > li > a", function () {
      jQuery(".todo-task-list li").removeClass("active");
      jQuery(".todo-task-list .sub-task").removeClass("show");
      jQuery(this).parent().toggleClass("active");
      jQuery(this).next().toggleClass("show");
    });
    jQuery(document).on("click", ".todo-task-list > li li > a", function () {
      jQuery(".todo-task-list li li").removeClass("active");
      jQuery(this).parent().toggleClass("active");
    });

    /*---------------------------------------------------------------------
           checkout
    -----------------------------------------------------------------------*/
    jQuery(document).ready(function () {
      jQuery("#place-order").click(function () {
        jQuery("#cart").removeClass("show");
        jQuery("#address").addClass("show");
      });
      jQuery("#deliver-address").click(function () {
        jQuery("#address").removeClass("show");
        jQuery("#payment").addClass("show");
      });
    });

    /*---------------------------------------------------------------------
            Page Loader
    -----------------------------------------------------------------------*/
    jQuery("#load").fadeOut();
    jQuery("#loading").delay().fadeOut("");

    /*---------------------------------------------------------------------
        Mailbox
    -----------------------------------------------------------------------*/
    jQuery(document).on("click", "ul.iq-email-sender-list li", function (e) {
      if (e.target.closest(".email-app-details") === null) {
        jQuery(this).find(".email-app-details").addClass("show");
      }
    });

    jQuery(document).on("click", ".email-remove", function (e) {
      jQuery(this).closest(".email-app-details").removeClass("show");
    });

    /*---------------------------------------------------------------------
        Confirm Button
    -----------------------------------------------------------------------*/
    $(".confirm-btn").on("click", function () {
      $(this).closest(".confirm-click-btn").find(".request-btn").hide();
    });

    /*---------------------------------------------------------------------
        Select input
    -----------------------------------------------------------------------*/
    jQuery(".select2jsMultiSelect").select2({
      tags: true,
      width: '100%'
    });

    /*---------------------------------------------------------------------
        Fieldset
    -----------------------------------------------------------------------*/
    $(document).ready(function () {
      var e,
        t,
        a,
        n,
        o = 1,
        r = $("fieldset").length;

      function i(e) {
        var t = parseFloat(100 / r) * e;
        (t = t.toFixed()), $(".progress-bar").css("width", t + "%");
      }
      i(o),
        $(".next").click(function () {
          (e = $(this).parent()),
            (t = $(this).parent().next()),
            $("#top-tab-list li").eq($("fieldset").index(t)).addClass("active"),
            $("#top-tab-list li").eq($("fieldset").index(e)).addClass("done"),
            t.show(),
            e.animate(
              {
                opacity: 0,
              },
              {
                step: function (a) {
                  (n = 1 - a),
                    e.css({
                      display: "none",
                      position: "relative",
                    }),
                    t.css({
                      opacity: n,
                    });
                },
                duration: 500,
              }
            ),
            i(++o);
        }),
        $(".previous").click(function () {
          (e = $(this).parent()),
            (a = $(this).parent().prev()),
            $("#top-tab-list li")
              .eq($("fieldset").index(e))
              .removeClass("active"),
            $("#top-tab-list li")
              .eq($("fieldset").index(a))
              .removeClass("done"),
            a.show(),
            e.animate(
              {
                opacity: 0,
              },
              {
                step: function (t) {
                  (n = 1 - t),
                    e.css({
                      display: "none",
                      position: "relative",
                    }),
                    a.css({
                      opacity: n,
                    });
                },
                duration: 500,
              }
            ),
            i(--o);
        }),
        $(".submit").click(function () {
          return !1;
        });
    }),
      $(document).ready(function () {
        var e = $("div.setup-panel div a"),
          t = $(".setup-content"),
          a = $(".nextBtn");
        t.hide(),
          e.click(function (a) {
            a.preventDefault();
            var n = $($(this).attr("href")),
              o = $(this);
            o.hasClass("disabled") ||
              (e.addClass("active"),
              o.parent().addClass("active"),
              t.hide(),
              n.show(),
              n.find("input:eq(0)").focus());
          }),
          a.click(function () {
            var e = $(this).closest(".setup-content"),
              t = e.attr("id"),
              a = $('div.setup-panel div a[href="#' + t + '"]')
                .parent()
                .next()
                .children("a"),
              n = e.find(
                "input[type='text'],input[type='email'],input[type='password'],input[type='url'],textarea"
              ),
              o = !0;
            $(".form-group").removeClass("has-error");
            for (var r = 0; r < n.length; r++)
              n[r].validity.valid ||
                ((o = !1),
                $(n[r]).closest(".form-group").addClass("has-error"));
            o && a.removeAttr("disabled").trigger("click");
          }),
          $("div.setup-panel div a.active").trigger("click");
      }),
      $(document).ready(function () {
        var e,
          t,
          a,
          n,
          o = 1,
          r = $("fieldset").length;

        function i(e) {
          var t = parseFloat(100 / r) * e;
          (t = t.toFixed()), $(".progress-bar").css("width", t + "%");
        }
        i(o),
          $(".next").click(function () {
            (e = $(this).parent()),
              (t = $(this).parent().next()),
              $("#top-tabbar-vertical li")
                .eq($("fieldset").index(t))
                .addClass("active"),
              t.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (a) {
                    (n = 1 - a),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      t.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(++o);
          }),
          $(".previous").click(function () {
            (e = $(this).parent()),
              (a = $(this).parent().prev()),
              $("#top-tabbar-vertical li")
                .eq($("fieldset").index(e))
                .removeClass("active"),
              a.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (t) {
                    (n = 1 - t),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      a.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(--o);
          }),
          $(".submit").click(function () {
            return !1;
          });
      }),
      $(document).ready(function () {
        $(".file-upload").on("change", function () {
          !(function (e) {
            if (e.files && e.files[0]) {
              var t = new FileReader();
              (t.onload = function (e) {
                $(".profile-pic").attr("src", e.target.result);
              }),
                t.readAsDataURL(e.files[0]);
            }
          })(this);
        }),
          $(".upload-button").on("click", function () {
            $(".file-upload").click();
          });
      }),
      $(function () {
        function e(e) {
          return (e / 100) * 360;
        }
        $(".progress-round").each(function () {
          var t = $(this).attr("data-value"),
            a = $(this).find(".progress-left .progress-bar"),
            n = $(this).find(".progress-right .progress-bar");
          t > 0 &&
            (t <= 50
              ? n.css("transform", "rotate(" + e(t) + "deg)")
              : (n.css("transform", "rotate(180deg)"),
                a.css("transform", "rotate(" + e(t - 50) + "deg)")));
        });
      });

    /*---------------------------------------------------------------------
            Vanila Datepicker
    -----------------------------------------------------------------------*/
    const datepickers = document.querySelectorAll(".vanila-datepicker");
    Array.from(datepickers, (elem) => {
      new Datepicker(elem);
    });
    const daterangePickers = document.querySelectorAll(
      ".vanila-daterangepicker"
    );
    Array.from(daterangePickers, (elem) => {
      new DateRangePicker(elem);
    });

    /*---------------------------------------------------------------------
            Form Validation
    -----------------------------------------------------------------------*/
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    window.addEventListener(
      "load",
      function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add("was-validated");
            },
            false
          );
        });
      },
      false
    );

    /*---------------------------------------------------------------------
            Form Wizard-validate
    -----------------------------------------------------------------------*/
    var registrationForm = $("#registration");
    if (registrationForm.length) {
      const wizard = new Enchanter(
        "registration",
        {},
        {
          onNext: () => {},
        }
      );
    }

    /*-----------------------------------------------------------------------------
                calender
    ------------------------------------------------------------------------------*/
    if (jQuery("#calendar1").length) {
      let calendarEl = document.getElementById("calendar1");
      let calendar1 = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        plugins: ["timeGrid", "dayGrid", "list", "interaction"],
        timeZone: "UTC",
        defaultView: "dayGridMonth",
        contentHeight: "auto",
        eventLimit: true,
        dayMaxEvents: 4,
        header: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        },
        dateClick: function (info) {
          $("#schedule-start-date").val(info.dateStr);
          $("#schedule-end-date").val(info.dateStr);
          $("#date-event").modal("show");
        },
        events: [
          {
            title: "Click for Google",
            url: "http://google.com/",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-20, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#50b5ff",
          },
          {
            title: "All Day Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-18, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#a09e9e",
          },
          {
            title: "Long Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-16, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            end:
              moment(new Date(), "YYYY-MM-DD")
                .add(-13, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#49f0d3",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-14, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#ffba68",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-12, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#d592ff ",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-10, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#ff9b8a",
          },
          {
            title: "Birthday Party",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-8, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#49f0d3",
          },
          {
            title: "Meeting",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-6, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#a09e9e",
          },
          {
            title: "Birthday Party",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-5, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#49f0d3",
          },
          {
            title: "Birthday Party",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(-2, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#ff9b8a ",
          },

          {
            title: "Meeting",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(0, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#ff9b8a",
          },
          {
            title: "Click for Google",
            url: "http://google.com/",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(0, "days")
                .format("YYYY-MM-DD") + "T06:30:00.000Z",
            color: "#d592ff",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(0, "days")
                .format("YYYY-MM-DD") + "T07:30:00.000Z",
            color: "#49f0d3",
          },
          {
            title: "Birthday Party",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(0, "days")
                .format("YYYY-MM-DD") + "T08:30:00.000Z",
            color: "#f4a965",
          },
          {
            title: "Doctor Meeting",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(0, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#f4a965",
          },
          {
            title: "All Day Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(1, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: " #50b5ff",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(8, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: " #50b5ff",
          },
          {
            groupId: "999",
            title: "Repeating Event",
            start:
              moment(new Date(), "YYYY-MM-DD")
                .add(10, "days")
                .format("YYYY-MM-DD") + "T05:30:00.000Z",
            color: "#49f0d3",
          },
        ],
      });
      calendar1.render();
    }

    /*---------------------------------------------------------------------
        weather
    -----------------------------------------------------------------------*/
    if (jQuery("#weather-chart").length) {
      am4core.ready(function () {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create map instance
        var chart = am4core.create("weather-chart", am4maps.MapChart);

        // Set map definition
        chart.geodata = am4geodata_worldHigh;

        // Set projection
        chart.projection = new am4maps.projections.Mercator();

        // Center on the groups by default
        chart.homeZoomLevel = 6;
        chart.homeGeoPoint = { longitude: 10, latitude: 51 };

        // Polygon series
        var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
        polygonSeries.exclude = ["AQ"];
        polygonSeries.useGeodata = true;
        polygonSeries.nonScalingStroke = true;
        polygonSeries.strokeOpacity = 0.5;

        // Image series
        var imageSeries = chart.series.push(new am4maps.MapImageSeries());
        var imageTemplate = imageSeries.mapImages.template;
        imageTemplate.propertyFields.longitude = "longitude";
        imageTemplate.propertyFields.latitude = "latitude";
        imageTemplate.nonScaling = true;

        var image = imageTemplate.createChild(am4core.Image);
        image.propertyFields.href = "imageURL.html";
        image.width = 50;
        image.height = 50;
        image.horizontalCenter = "middle";
        image.verticalCenter = "middle";

        var label = imageTemplate.createChild(am4core.Label);
        label.text = "{label}";
        label.horizontalCenter = "middle";
        label.verticalCenter = "top";
        label.dy = 20;

        imageSeries.data = [
          {
            latitude: 40.416775,
            longitude: -3.70379,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/rainy-1.svg",
            width: 32,
            height: 32,
            label: "Madrid: +22C",
          },
          {
            latitude: 48.856614,
            longitude: 2.352222,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/thunder.svg",
            width: 32,
            height: 32,
            label: "Paris: +18C",
          },
          {
            latitude: 52.520007,
            longitude: 13.404954,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/cloudy-day-1.svg",
            width: 32,
            height: 32,
            label: "Berlin: +13C",
          },
          {
            latitude: 52.229676,
            longitude: 21.012229,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/day.svg",
            width: 32,
            height: 32,
            label: "Warsaw: +22C",
          },
          {
            latitude: 41.872389,
            longitude: 12.48018,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/day.svg",
            width: 32,
            height: 32,
            label: "Rome: +29C",
          },
          {
            latitude: 51.507351,
            longitude: -0.127758,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/rainy-7.svg",
            width: 32,
            height: 32,
            label: "London: +10C",
          },
          {
            latitude: 59.329323,
            longitude: 18.068581,
            imageURL:
              "https://www.amcharts.com/lib/images/weather/animated/rainy-1.svg",
            width: 32,
            height: 32,
            label: "Stockholm: +8C",
          },
        ];
      });
    }

    /*---------------------------------------------------------------------
    Editable Table 
    -----------------------------------------------------------------------*/
    const $tableID = $("#table"),
      $BTN = $("#export-btn"),
      $EXPORT = $("#export"),
      newTr =
        '\n<tr class="hide">\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half">\n    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>\n    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>\n  </td>\n  <td>\n    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>\n  </td>\n</tr>';
    $(".table-add").on("click", "i", () => {
      const e = $tableID
        .find("tbody tr")
        .last()
        .clone(!0)
        .removeClass("hide table-line");
      0 === $tableID.find("tbody tr").length && $("tbody").append(newTr),
        $tableID.find("table").append(e);
    }),
      $tableID.on("click", ".table-remove", function () {
        $(this).parents("tr").detach();
      }),
      $tableID.on("click", ".table-up", function () {
        const e = $(this).parents("tr");
        1 !== e.index() && e.prev().before(e.get(0));
      }),
      $tableID.on("click", ".table-down", function () {
        const e = $(this).parents("tr");
        e.next().after(e.get(0));
      }),
      (jQuery.fn.pop = [].pop),
      (jQuery.fn.shift = [].shift),
      $BTN.on("click", () => {
        const e = $tableID.find("tr:not(:hidden)"),
          t = [],
          a = [];
        $(e.shift())
          .find("th:not(:empty)")
          .each(function () {
            t.push($(this).text().toLowerCase());
          }),
          e.each(function () {
            const e = $(this).find("td"),
              n = {};
            t.forEach((t, a) => {
              n[t] = e.eq(a).text();
            }),
              a.push(n);
          }),
          $EXPORT.text(JSON.stringify(a));
      }),
      $(document).ready(function () {
        var e,
          t,
          a,
          n,
          o = 1,
          r = $("fieldset").length;

        function i(e) {
          var t = parseFloat(100 / r) * e;
          (t = t.toFixed()), $(".progress-bar").css("width", t + "%");
        }
        i(o),
          $(".next").click(function () {
            (e = $(this).parent()),
              (t = $(this).parent().next()),
              $("#top-tab-list li")
                .eq($("fieldset").index(t))
                .addClass("active"),
              $("#top-tab-list li").eq($("fieldset").index(e)).addClass("done"),
              t.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (a) {
                    (n = 1 - a),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      t.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(++o);
          }),
          $(".previous").click(function () {
            (e = $(this).parent()),
              (a = $(this).parent().prev()),
              $("#top-tab-list li")
                .eq($("fieldset").index(e))
                .removeClass("active"),
              $("#top-tab-list li")
                .eq($("fieldset").index(a))
                .removeClass("done"),
              a.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (t) {
                    (n = 1 - t),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      a.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(--o);
          }),
          $(".submit").click(function () {
            return !1;
          });
      }),
      $(document).ready(function () {
        var e = $("div.setup-panel div a"),
          t = $(".setup-content"),
          a = $(".nextBtn");
        t.hide(),
          e.click(function (a) {
            a.preventDefault();
            var n = $($(this).attr("href")),
              o = $(this);
            o.hasClass("disabled") ||
              (e.addClass("active"),
              o.parent().addClass("active"),
              t.hide(),
              n.show(),
              n.find("input:eq(0)").focus());
          }),
          a.click(function () {
            var e = $(this).closest(".setup-content"),
              t = e.attr("id"),
              a = $('div.setup-panel div a[href="#' + t + '"]')
                .parent()
                .next()
                .children("a"),
              n = e.find(
                "input[type='text'],input[type='email'],input[type='password'],input[type='url'],textarea"
              ),
              o = !0;
            $(".form-group").removeClass("has-error");
            for (var r = 0; r < n.length; r++)
              n[r].validity.valid ||
                ((o = !1),
                $(n[r]).closest(".form-group").addClass("has-error"));
            o && a.removeAttr("disabled").trigger("click");
          }),
          $("div.setup-panel div a.active").trigger("click");
      }),
      $(document).ready(function () {
        var e,
          t,
          a,
          n,
          o = 1,
          r = $("fieldset").length;
        function i(e) {
          var t = parseFloat(100 / r) * e;
          (t = t.toFixed()), $(".progress-bar").css("width", t + "%");
        }
        i(o),
          $(".next").click(function () {
            (e = $(this).parent()),
              (t = $(this).parent().next()),
              $("#top-tabbar-vertical li")
                .eq($("fieldset").index(t))
                .addClass("active"),
              t.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (a) {
                    (n = 1 - a),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      t.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(++o);
          }),
          $(".previous").click(function () {
            (e = $(this).parent()),
              (a = $(this).parent().prev()),
              $("#top-tabbar-vertical li")
                .eq($("fieldset").index(e))
                .removeClass("active"),
              a.show(),
              e.animate(
                {
                  opacity: 0,
                },
                {
                  step: function (t) {
                    (n = 1 - t),
                      e.css({
                        display: "none",
                        position: "relative",
                      }),
                      a.css({
                        opacity: n,
                      });
                  },
                  duration: 500,
                }
              ),
              i(--o);
          }),
          $(".submit").click(function () {
            return !1;
          });
      }),
      $(document).ready(function () {
        $(".file-upload").on("change", function () {
          !(function (e) {
            if (e.files && e.files[0]) {
              var t = new FileReader();
              (t.onload = function (e) {
                $(".profile-pic").attr("src", e.target.result);
              }),
                t.readAsDataURL(e.files[0]);
            }
          })(this);
        }),
          $(".upload-button").on("click", function () {
            $(".file-upload").click();
          });
      }),
      $(function () {
        function e(e) {
          return (e / 100) * 360;
        }
        $(".progress-round").each(function () {
          var t = $(this).attr("data-value"),
            a = $(this).find(".progress-left .progress-bar"),
            n = $(this).find(".progress-right .progress-bar");
          t > 0 &&
            (t <= 50
              ? n.css("transform", "rotate(" + e(t) + "deg)")
              : (n.css("transform", "rotate(180deg)"),
                a.css("transform", "rotate(" + e(t - 50) + "deg)")));
        });
      });
  });

  /*------------Resize Plugins--------------*/
  const resizePlugins = () => {
    // For sidebar-mini & responsive
    const sidebarResponsive = document.querySelector(
      '[data-sidebar="responsive"]'
    );
    if (window.innerWidth < 1025) {
      if (sidebarResponsive !== null) {
        if (!sidebarResponsive.classList.contains("sidebar-mini")) {
          sidebarResponsive.classList.add("sidebar-mini", "on-resize");
        }
      }
    } else {
      if (sidebarResponsive !== null) {
        if (
          sidebarResponsive.classList.contains("sidebar-mini") &&
          sidebarResponsive.classList.contains("on-resize")
        ) {
          sidebarResponsive.classList.remove("sidebar-mini", "on-resize");
        }
      }
    }
  };

  /*------------DOMContentLoaded--------------*/
  document.addEventListener("DOMContentLoaded", (event) => {
    resizePlugins();
  });
  /*------------Window Resize------------------*/
  window.addEventListener("resize", function (event) {
    resizePlugins();
  });

  jQuery(document).on("click", ".modal-backdrop.show", function () {
    if (jQuery(".search-modal.show").length) {
      bootstrap.Modal.getInstance("#searchmodal").hide();
    }
  });

  /*------------load more------------------*/
  const loadContent = () => {
    const content = document.getElementById("load-copy-content").innerHTML;
    $(".social-post-container").append(content);
    $(".loader-ellips").hide();
    var hasMoreContent = Math.random() < 0.8;
    if (!hasMoreContent) {
      $(".infinite-scroll-last").show();
    }
  };

  $(document).ready(function () {
    var isLoading = false;
    var loadCount = 0;
    var maxLoadCount = 1;
    $(window).scroll(function () {
      if (
        loadCount < maxLoadCount &&
        $(window).scrollTop() + $(window).height() >=
          $("#content").height() - 100 &&
        !isLoading
      ) {
        $(".loader-ellips").show();
        setTimeout(function () {
          loadContent();
          isLoading = false;
          loadCount++;
        }, 2000);

        isLoading = true;
      }
    });
  });
    
    /*------------DOMContentLoaded--------------*/
        document.addEventListener('DOMContentLoaded', (event) => {
            resizePlugins()
        });
    /*------------Window Resize------------------*/
        window.addEventListener('resize', function (event) {
            resizePlugins()
        });
    
    jQuery(document).on('click', '.modal-backdrop.show', function () {
        if (jQuery('.search-modal.show').length) {
            bootstrap.Modal.getInstance('#searchmodal').hide()
        }
    })
  
  function chatPopupModal() {
    let clickableElements = document.querySelectorAll('[data-target="chat-popup-modal"]');

    clickableElements.forEach(function (clickableElement) {
      clickableElement.addEventListener('click', function () {
        let targetId = clickableElement.getAttribute('data-target');
        let targetElement = document.getElementById(targetId);
        if (targetElement) {
          targetElement.classList.add('show');
        }
      });
    });

    let closeBtn = document.querySelector('.chat-popup-modal-close');

    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        let chatModal = document.getElementById('chat-popup-modal');
        if (chatModal.classList.contains('show')) {
          chatModal.classList.remove('show');
        }
      });
    }
  };

  chatPopupModal();

  function SearchModal() {
    let openBtns = document.querySelectorAll(".open-modal-search");

    openBtns.forEach(function (clickElement) {
      clickElement.addEventListener('click', function (event) {
        event.stopPropagation();

        let openModal = clickElement.nextElementSibling;

        document.querySelectorAll('.search-modal-custom.open').forEach(function (modal) {
          if (modal !== openModal) {
            modal.classList.remove('open');
          }
        });

        openModal.classList.toggle('open');
      });
    });

    document.addEventListener('click', function (event) {
      if (!event.target.closest('.search-modal-custom')) {
        document.querySelectorAll('.search-modal-custom.open').forEach(function (modal) {
          modal.classList.remove('open');
        });
      }
    });
  }

  SearchModal();


})(jQuery);