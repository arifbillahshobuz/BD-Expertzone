/*-----------------------------
 * Functions
 * - init
 * - reInit
 * - destroy
 * - storageGet
 * - storageSet
 * - storageRemove
 * - UpdateOption
 * - setSettingOption
 * - UpdateOptionFromStorage
 * - CustomEvent for updateOption
 * - CustomEvent for updateOptionFromStorage
 * - setDefault option Soon
 * - addListeners
   * - radioListener
   * - checkboxListener
   * - attribuiteListener
   * - styleListener
 * - removeListeners
    * - radioListener
    * - checkboxListener
    * - attribuiteListener
    * - styleListener
 * - addClass
 * - removeClass
 * - toggleClass
 * - observeStorage:  https://developer.mozilla.org/en-US/docs/Web/API/Window/storage_event
-----------------------------*/

/*************************
 * Lodash functions use
 * https://lodash.com/docs/4.17.15#functions
 *  function list:
    - _.keys
    - _.has
    - _.findKey
    - _.find
    - _.forEach
    - _.isObject
    - _.isArray
    - _.isString
 * ***********************/

/****** Incomplete Points
 * Color Customizer with color pallet & Custom Color
 * Font Family by root variables
 * FOOTER FIXED
 - position: STICKY;
 - bottom: 0;
 * ***/
 (function (window) {
  // Listners for Customizer

  const selectors = {
    radio: document.querySelectorAll('[data-setting="radio"]'),
    checkbox: document.querySelectorAll('[data-setting="checkbox"]'),
    attribute: document.querySelectorAll('[data-setting="attribute"]'),
    color: document.querySelectorAll('[data-setting="color"]'),
  };

  /**************************************************************************
   * Default Object for setting Start
   * **********************************************************************/

  const defaults = defaultSetting();

  function defaultSetting() {
    return {
      saveLocal: "sessionStorage", // sessionStorage, localStorage, null
      storeKey: "socialV",
      setting: defaultSettingOption(),
      beforeInit: function (cb) {
        return cb;
      },
      afterInit: function (cb) {
        return cb;
      },
    };
  }

  function defaultSettingOption() {
    return {
      theme_scheme_direction: {
        target: "html",
        choices: ["ltr", "rtl"],
        value: "ltr",
      },
      theme_scheme: {
        target: "html",
        choices: ["light", "dark", "auto"],
        value: "light",
      },
      theme_color: {
        target: "html",
        choices: [
            "default",
            "color-1",
            "color-2",
            "color-3",
            "color-4",
            "color-5",
        ],
        type: "variable",
        colors: {},
        value: "default",
      },
      sidebar_type: {
        target: '[data-toggle="main-sidebar"]',
        choices: ["sidebar-hover", "sidebar-mini", "sidebar-soft"],
        value: [],
      },
      sidebar_menu_style: {
        target: '[data-toggle="main-sidebar"]',
        choices: [
          "navs-rounded",
          "navs-rounded-all",
          "navs-pill",
          "navs-pill-all"
        ],
        value: "navs-rounded-all",
      },
      footer: {
        target: ".footer",
        choices: ["sticky", "default"],
        value: "default",
      }
    };
  }

  /**************************************************************************
   * Default Object for setting End
   * **********************************************************************/

  // Main function
  this.IQSetting = function (opt) {
    this.options = {};

    this.arg = opt;

    this.extend(defaults);

    if (typeof this.options.saveLocal !== typeof null && this.options.saveLocal !== '') {
      this.getStorageValue(this.options.storeKey);
    }

    this.updateOptionFromStorage();

    if (_.isFunction(this.options.beforeInit)) {
      this.options.beforeInit(this);
    }

    this.init();

    if (_.isFunction(this.options.afterInit)) {
      this.options.afterInit(this);
    }

    this.addListeners();

    return this;
  };

  /**************************************************************************
   * Initialize Functions Start
   * **********************************************************************/

  // extend object function to the IQSetting prototype
  IQSetting.prototype.extend = function (defaults) {
    // Create options by extending defaults with the passed in arugments
    if (this.arg && _.isObject(this.arg)) {
      this.options = IQUtils.mergeDeep(defaults, this.arg);
    } else {
      this.options = defaults;
    }
  };

  // Function call by parameter to the IQSetting prototype
  IQSetting.prototype.fnCall = function (
    key,
    value = this.getSettingKey(key).value
  ) {
    if (_.isString(key)) {
      if (
        this.__proto__.hasOwnProperty(key) &&
        _.isFunction(this.__proto__[key])
      ) {
        this.__proto__[key].call(this, value);
      }
    }
  };

  // Init function to the IQSetting prototype
  IQSetting.prototype.init = function () {
    const keys = _.keys(this.options.setting);
    _.forEach(keys, (key) => {
      this.fnCall(key);
    });

    this.saveOption();
  };

  // reInit function to the IQSetting prototype
  IQSetting.prototype.reInit = function () {
    this.destroy();
    this.extend(defaultSetting());
    this.saveLocal(this.options.saveLocal);
    this.init();
    this.afterUpdate("reinit", this.options);
    this.resetFontFamily();
  };

  // After Update function to the IQSetting Prototype
  IQSetting.prototype.afterUpdate = function (
    key,
    value,
    currentValue = ''
  ) {
    const event = new CustomEvent(key, { detail: {value: value, name: key, currentValue: currentValue }});
    document.dispatchEvent(event);
    this.saveOption();
  };

  // Destroy function to the IQSetting prototype
  IQSetting.prototype.destroy = function () {
    this.removeOption();
    this.removeListeners();
  };

  // addListeners function to the IQSetting prototype
  IQSetting.prototype.addListeners = function (elems, key) {
    this.addRadioListener();
    this.addCheckboxListener();
    this.addAttributeListener();
    this.addColorListner();
  };

  // removeListeners function to the IQSetting prototype
  IQSetting.prototype.removeListeners = function (elems, key) {
    this.removeRadioListeners();
    this.removeCheckboxListeners();
    this.removeAttributeListeners();
  };

  /**************************************************************************
   * Initialize Functions End
   * **********************************************************************/

  /**************************************************************************
   * Get Value Functions Start
   * **********************************************************************/

  // Update option key values to the IQSetting
  IQSetting.prototype.setMainOption = function (key, value) {
    this.options[key] = value;
  };

  // get setting options function to the IQSetting prototype
  IQSetting.prototype.getSettingOptions = function () {
    return this.options.settings;
  };

  // get Setting key function to the IQSetting prototype
  IQSetting.prototype.getSettingKey = function (key) {
    return this.options.setting[key];
  };

  // Update option setting key values to the IQSetting
  IQSetting.prototype.setSettingOption = function (key, value, manual) {
    if (manual) {
      this.options.setting[key].value = value;
    }
  };

  // Update theme color custom choise object to the IQSetting
  this.IQSetting.prototype.setSettingColorChoice = function (key, pair) {
    this.options.setting[key].colors[pair.key] = pair.value;
  };

  // Static method to get the instance of the IQSetting
  IQSetting.getInstance = function () {
    if (!IQSetting.instance) {
      IQSetting.instance = new IQSetting();
    }
    return IQSetting.instance;
  };

  /**************************************************************************
   * Get Value Functions End
   * **********************************************************************/

  /**************************************************************************
   * Storage get & update Functions Start
   * **********************************************************************/

  // function for save option in localStorage or sessionStorage based on options
  IQSetting.prototype.saveOption = function () {
    const key = this.options.storeKey;
    const value = this.options;
    IQUtils.removeSessionStorage(key);
    IQUtils.removeLocalStorage(key);
    switch (this.options.saveLocal) {
      case "sessionStorage":
        return IQUtils.saveSessionStorage(key, JSON.stringify(value));
        break;

      default:
        break;
    }
  };

  // function for get option in localStorage or sessionStorage based on options
  IQSetting.prototype.getOption = function (storage) {
    const key = this.options.storeKey;
    switch (storage) {
      case "sessionStorage":
        return IQUtils.getSessionStorage(key);
        break;
      default:
        break;
    }
  };

  // function for remove option to localStorage or sessionStorage based on options
  IQSetting.prototype.removeOption = function () {
    const key = this.options.storeKey;
    switch (this.options.saveLocal) {
      case "sessionStorage":
        IQUtils.removeSessionStorage(key);
        break;

      default:
        break;
    }
  };

  // function for update option from localStorage or sessionStorage based on options
  IQSetting.prototype.updateOptionFromStorage = function () {
    const key = this.options.storeKey;
    switch (this.options.saveLocal) {
      case "sessionStorage":
        const sessionValue = IQUtils.getSessionStorage(key);
        if (sessionValue) {
          this.options = JSON.parse(sessionValue);
        }
        break;
      default:
        this.removeOption();
        break;
    }
  };

  // function for get storage value if exists
  IQSetting.prototype.getStorageValue = function (key) {
    const checkKey = IQUtils.checkStorageArray(key, [
      "localStorage",
      "sessionStorage",
    ]);
    if (!checkKey.result) {
      this.options = JSON.parse(this.getOption(checkKey.storage));
      IQUtils.getElems(`input[name="saveLocal"]`).forEach(function (el) {
        el.checked = false;
        if (el.value === checkKey.storage) {
          el.checked = true;
        }
      });
    }
  };

  /**************************************************************************
   * Storage get & update Functions End
   * **********************************************************************/

  /**************************************************************************
   * Input Update Functions Start
   * **********************************************************************/

  // Input radio input manually change function to the IQSetting prototype
  IQSetting.prototype.__radioInputChange__ = function (key) {
    const obj = this.getSettingKey(key);
    IQUtils.getElems(`input[name="${key}"]`).forEach(function (el) {
      el.checked = false;
      if (el.value === obj.value) {
        el.checked = true;
      }
    });
  };
  // Input checkbox input manually change function to the IQSetting prototype
  IQSetting.prototype.__checkboxInputChange__ = function (key) {
    const obj = this.getSettingKey(key);
    IQUtils.getElems(`input[name="${key}"]`).forEach(function (el) {
      el.checked = false;
      if (obj.value.indexOf(el.value) !== -1) {
        el.checked = true;
      }
    });
  };

  /**************************************************************************
   * Input Update Functions End
   * **********************************************************************/

  /**************************************************************************
   * Dom & Object Update Functions Start
   * IQSetting.options update functions saveLocal, setting:key, value etc...
   * **********************************************************************/

  // radio update function to the IQSetting prototype
  IQSetting.prototype.__radioUpdate__ = function (key, value, cb) {
    const obj = this.getSettingKey(key);
    if (value !== null) {
      obj.value = value;
      this.setSettingOption(key, value);
    }
    if (obj.target !== null) {
      obj.choices.forEach((other) => {
        IQUtils.removeClass(obj.target, other);
      });
      IQUtils.addClass(obj.target, value);
    }
    this.__radioInputChange__(key);
    if (_.isFunction(cb)) {
      cb(key, value, obj);
    }
    this.afterUpdate(key, value);
  };

  // attribute update function to the IQSetting prototype
  IQSetting.prototype.__attributeUpdate__ = function (
    key,
    pair = { prop: "color", value: "value" },
    cb
  ) {
    const obj = this.getSettingKey(key);
    if (pair.value !== null) {
      obj.value = pair.value;
      this.setSettingOption(key, pair.value);
    }
    if (obj.target !== null) {
      IQUtils.setAttr(obj.target, pair);
    }
    this.__radioInputChange__(key);
    if (_.isFunction(cb)) {
      cb(key, pair.value);
    }
    this.afterUpdate(key, pair);
  };

  // checkbox update function to the IQSetting Prototype
  IQSetting.prototype.__checkboxUpdate__ = function (key, value, currentValue, cb) {
    const obj = this.getSettingKey(key);
    if (value !== null) {
      obj.value = value;
      this.setSettingOption(key, value);
    }
    if (obj.target !== null) {
      obj.choices.forEach((other) => {
        IQUtils.removeClass(obj.target, other);
      });
      if (obj.value.length) {
        obj.value.forEach((objValue) => {
          IQUtils.addClass(obj.target, objValue);
        });
      }
    }
    this.__checkboxInputChange__(key);
    if (_.isFunction(cb)) {
      cb(key, value);
    }
    this.afterUpdate(key, value, currentValue);
  };

  // input update function to the IQSetting Prototype
  IQSetting.prototype.__inputUpdate__ = function (key, value, cb) {
    const obj = this.getSettingKey(key);
    if (value !== null) {
      obj.value = value;
      this.setSettingOption(key, value);
    }
    if (obj.target !== null) {
      IQUtils.setContent(obj.target, value.substr(0, 10));
    }
    this.__inputChange__(key, value);
    if (_.isFunction(cb)) {
      cb(key, value);
    }
    this.afterUpdate(key, value);
  };

  // Update theme color & custom color to the IQSetting Prototype
  IQSetting.prototype.__updateThemeColor__ = function (key, value) {
    const obj = this.getSettingKey(key);
    if (value !== null) {
      obj.value = value;
      this.setSettingOption(key, value);
    }
    if (obj.target !== null) {
      obj.choices.forEach((other) => {
        IQUtils.removeClass(obj.target, other);
      });
      if (obj.value !== "custom") {
        this.resetColor(key);
      }
      if (!_.isObject(obj.value)) {
        this.__attributeUpdate__("theme_color", { prop: "data-bs-theme-color", value: 'custom' })
        let prefix = IQUtils.getRootVars("--prefix") || "bs-";
        let newColors = {};
        document.querySelectorAll('.custom-color').forEach(element => {
          if(element) {
            element.remove()
          }
        });
        _.forEach(obj.colors, (value, key) => {
          key = key.replace("{{prefix}}", prefix);
          newColors = {
            ...newColors,
            ...IQUtils.getColorShadeTint(key, value),
          };
        });
      }
    }
    this.__radioInputChange__(key);
    this.afterUpdate(key, value);
  };

  this.IQSetting.prototype.resetColor = function (key) {
    const choices = defaults.setting.theme_color.choices.find(
      (x) => x.name == "custom"
    );
    if (choices !== undefined) {
      _.forEach(defaults.setting.theme_color.colors, (value, index) => {
        this.setSettingColorChoice(key, {
          key: index,
          value: value,
        });
      });
    }
  };

  // Update font function to the IQSetting Prototype
  IQSetting.prototype.__selectUpdate__ = function (key, value) {
    const obj = this.getSettingKey(key);
    if (value !== null) {
      obj.value = value;
      this.setSettingOption(key, value);
    }
    if (obj.target !== null) {
      IQUtils.setFontFamily(value, obj.target);
    }
    this.__selectInputChange__(key);
    this.afterUpdate(key, value);
  };

  // Update option function to the IQSetting Prototype
  IQSetting.prototype.__updateOption__ = function (key, value) {
    this.setMainOption(key, value);
    this.saveOption();
    this.updateOptionFromStorage();
  };

  /**************************************************************************
   * Dom & Object Update Functions End
   * **********************************************************************/

  /**************************************************************************
   * Add Listener Functions Start
   * **********************************************************************/

  // Add radio event listener to the IQSetting prototype
  IQSetting.prototype.addRadioListener = function (cb) {
    const self = this;
    selectors.radio.forEach(function (item) {
      item.addEventListener("change", function (e) {
        const value = e.target.value;
        const key = e.target.getAttribute("name");
        // Update dom values based on radio button
        if (key === "theme_color") {
          self.__attributeUpdate__("theme_color", { prop: "data-bs-theme-color", value: value })
        }
        self.__proto__[key].call(self, value);
        if (_.isFunction(cb)) {
          cb();
        }
      });
    });
  };

  // Add checkbox event listener to the IQSetting Prototype
  IQSetting.prototype.addCheckboxListener = function (cb) {
    const self = this;

    // add event listener to all setting checkboxes
    selectors.checkbox.forEach(function (item) {
      item.addEventListener("change", (e) => {
        const values = [];
        const key = e.target.getAttribute("name");

        // checkbox values get from domElement
        const checkboxElements = document.querySelectorAll(`[name="${key}"]`);
        checkboxElements.forEach(function (item) {
          if (item.checked) {
            values.push(item.value);
          }
        });

        // Update dom values based on checkbox
        self.__proto__[key].call(self, values, e.target.value);
        if (_.isFunction(cb)) {
          cb();
        }
      });
    });
  };

  // Add attribute event listener to the IQSetting Prototype
  IQSetting.prototype.addAttributeListener = function (cb) {
    const self = this;
    selectors.attribute.forEach(function (item) {
      // add event listener for attribute change
      item.addEventListener("change", function (e) {
        const value = e.target.value;
        const key = e.target.getAttribute("name");
        const pair = {
          prop: e.target.getAttribute("data-prop"),
          value: value,
        };
        // Update dom values based on attribute
        self.__proto__[key].call(self, pair.value);
        if (_.isFunction(cb)) {
          cb();
        }
      });
    });
  };

    // Add color event listner to the IQSetting Prototype
    IQSetting.prototype.addColorListner = function () {
      const self = this;
      selectors.color.forEach((item) => {
        const debFun = IQUtils.debounce(
          function (name, value) {
            self.setSettingColorChoice(name, value);
            self.theme_color("custom");
          },
          200,
          false
        );
        item.addEventListener(
          "input",
          (e) => {
            const value = {
              key: `--{{prefix}}${e.target.dataset.extra}`,
              value: e.target.value,
            };
            debFun(e.target.name, value);
          },
          false
        );
      });
    };

  /**************************************************************************
   * Add Listener Functions End
   * **********************************************************************/

  /**************************************************************************
   * Remove Listener Functions Start
   * **********************************************************************/

  // remove radio listeners function to the IQSetting prototype
  IQSetting.prototype.removeRadioListeners = function () {
    selectors.radio.forEach(function (item) {
      item.removeEventListener("change", null);
    });
  };

  // remove checkbox listeners function to the IQSetting prototype
  IQSetting.prototype.removeCheckboxListeners = function () {
    selectors.checkbox.forEach(function (item) {
      item.removeEventListener("change", null);
    });
  };

  // remove attribute listeners function to the IQSetting prototype
  IQSetting.prototype.removeAttributeListeners = function () {
    selectors.attribute.forEach(function (item) {
      item.removeEventListener("change", null);
    });
  };

  /**************************************************************************
   * Remove Listener Functions End
   * **********************************************************************/

  // 1. theme_scheme function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.theme_scheme = function (value) {
    if (typeof value !== typeof null) {
      this.__attributeUpdate__(
        "theme_scheme",
        { prop: "data-bs-theme", value: value },
        function (key, val) {
          document.querySelector("html").setAttribute("data-bs-theme",value);
          if (value == "auto") {
            if (matchMedia("(prefers-color-scheme: light)").matches) {
              document.querySelector("html").setAttribute("data-bs-theme","light");
            } else {
              document.querySelector("html").setAttribute("data-bs-theme","dark");
            }
          }
        }
      );
    }
  };

  // 2. theme_scheme_direction function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.theme_scheme_direction = function (value) {
    if (typeof value !== typeof null) {
      const __this = this;
      this.__attributeUpdate__(
        "theme_scheme_direction",
        { prop: "dir", value: value },
        function (key, val) {
          __this.rtlChange(val == "rtl" ? true : false);
          if(typeof $ !== typeof undefined) {
            if ($(`[data-select="font"]`).data("select2")) {
              $(`[data-select="font"]`).select2("destroy").select2();
            }
          }
        }
      );
    }
  };

  // 3. theme_color function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.theme_color = function (value) {
    if (typeof value !== typeof null) {
      this.__radioUpdate__("theme_color", value);
    }
  };

  // 4. sidebar_type function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.sidebar_type = function (value, currentValue) {
    if (value !== null) {
      this.__checkboxUpdate__("sidebar_type", value, currentValue);
    }
  };

  // 5. sidebar_menu_style function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.sidebar_menu_style = function (value) {
    if (typeof value !== typeof null) {
      this.__radioUpdate__("sidebar_menu_style", value);
    }
  };

  // 6. footer function to the IQSetting prototype @params: value (string)
  IQSetting.prototype.footer = function (value) {
    if (typeof value !== typeof null) {
      this.__radioUpdate__("footer", value);
    }
  };

    // 7. theme_color function to the IQSetting prototype @params: value (string)
    IQSetting.prototype.theme_color = function (value) {
      console.log(value);
      if (typeof value !== typeof null) {
        if(value == 'custom') {
          this.__updateThemeColor__("theme_color")
        } else {
          this.__attributeUpdate__("theme_color", { prop: "data-bs-theme-color", value: value })
        }
      }
    };

  // saveLocal function to the IQSetting prototype value (string)
  IQSetting.prototype.saveLocal = function (value = null) {
    if (value !== null) {
      this.__updateOption__("saveLocal", value);
    }
  };

  /**************************************************************************
   * Additional Functions Start
   * **********************************************************************/
  // Rtl Change to Offcanvas left to right Static Function
  IQSetting.prototype.rtlChange = function (check) {
    IQUtils.addClass(".offcanvas-start", "on-rtl", "start");
    IQUtils.addClass(".offcanvas-end", "on-rtl", "end");
    if (check) {
      IQUtils.addClass(".on-rtl.start", "offcanvas-end");
      IQUtils.removeClass(".on-rtl.start", "offcanvas-start");
      IQUtils.addClass(".on-rtl.end", "offcanvas-start");
      IQUtils.removeClass(".on-rtl.end", "offcanvas-end");
    } else {
      IQUtils.addClass(".on-rtl.start", "offcanvas-start");
      IQUtils.removeClass(".on-rtl.start", "offcanvas-end");
      IQUtils.addClass(".on-rtl.end", "offcanvas-end");
      IQUtils.removeClass(".on-rtl.end", "offcanvas-start");
    }
  };
  /**************************************************************************
   * Additional Functions End
   * **********************************************************************/

  // Export the IQSetting
  window.IQSetting = this.IQSetting;

  // reset font color
  const resetFont = document.querySelector('[data-reset="body-heading-font"]');
  if (resetFont !== null) {
    resetFont.addEventListener("click", (e) => {
      e.preventDefault();
      this.IQSetting.setSettingOption("body_font_family", "Inter", true);
      this.IQSetting.setSettingOption("heading_font_family", "Inter", true);
      this.IQSetting.resetFontFamily();
    });
  }

  return window.IQSetting;
})(window);
