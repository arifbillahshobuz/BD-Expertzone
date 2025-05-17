(function () {
  ("use strict");
  // Customizer Setting initialize
  let setting_options = document.querySelector('meta[name="setting_options"]');
  if (setting_options !== null && setting_options !== undefined) {
    setting_options = JSON.parse(setting_options.getAttribute("content"));
  } else {
    setting_options = JSON.parse("{}");
  }

  const theme = IQUtils.getQueryString('theme')
  if(theme !== '' && theme !== null) {
    setting_options = selectTheme(theme)
  }

  const setting = (window.IQSetting = new IQSetting(setting_options));

  // Sidebar type event listener
  $(document).on("sidebar_type", function (e) {
    if (typeof setting !== typeof undefined) {
      const sidebarType = setting.options.setting.sidebar_type.value;
      if(e.detail.value.length !== 0) {
        if(e.detail.currentValue !== 'sidebar-mini' && e.detail.currentValue !== '') {
          if (sidebarType.includes("sidebar-hover") && !e.detail.value.includes("sidebar-mini")) {
            const newTypes = sidebarType;
            newTypes.push("sidebar-mini");
            setting.sidebar_type(newTypes);
          }
        }
      }
    }
  });

  document.addEventListener('click', function(e) {
    const liveCustomizerPannel = document.querySelector('#live-customizer')
    if(liveCustomizerPannel !== null) {
      if(liveCustomizerPannel.classList.contains('show')) {
        if(e.target.closest('.live-customizer') == null && e.target.closest('#settingbutton') == null) {
          bootstrap.Offcanvas.getInstance(liveCustomizerPannel).hide()
        }
      }
    }
  })

  const liveCusomizer = IQUtils.getQueryString('live-customizer')
  if(liveCusomizer !== '' && liveCusomizer !== null && liveCusomizer === 'open') {
    const liveCustomizerPannel = document.querySelector('#live-customizer')
    const liveCustomizerInstance = new bootstrap.Offcanvas(liveCustomizerPannel)
    if(liveCustomizerInstance !== null) {
      liveCustomizerInstance.show()
    }
  }

})();
