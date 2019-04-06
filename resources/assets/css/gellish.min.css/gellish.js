// https://www.mikedoesweb.com/2012/creating-your-own-javascript-library/
//study source library https://j11y.io/jquery/#v=1.11.2&fn=jQuery._eval
// The `_` object constructor
function $(selector) {

    // About object is returned if there is no 'id' parameter
    var about = {
        Version: 0.5,
        Author: "Gellish",
        Created: "2019",
        Updated: "n/a"
    };

    if (selector) {

        // Avoid clobbering the window scope:
        // return a new _ object if we're in the wrong scope
        if (window === this) {
            return new $(selector);
        }

        // We're in the correct object scope:
        // Init our element object and return the object
        this.element = document.querySelector(selector);
        return this;
    } else {
        // No 'id' parameter was given, return the 'about' object
        return about;
    }
};

$.prototype = {
    addListener: function (event, callback) {
        this.element.addEventListener(event, callback, false);
    },
    click: function (callback) {
        this.addListener('click', callback);
    },
    mouseOver: function (callback) {
        this.addListener('onMouseOver', callback);
    },
    hide: function () {
        this.element.style.display = 'none';
        return this;
    },
    show: function () {
        this.element.style.display = 'inherit';
        return this;
    },
    bgcolor: function (color) {
        this.element.style.background = color;
        return this;
    },
    color: function (bgcolor, color) {
        this.element.style.background = bgcolor;
        this.element.style.color = color;
        return this;
    },
    val: function (newval) {
        this.element.value = newval;
        return this;
    },
    toggle: function () {
        if (this.element.style.display !== 'none') {
            this.element.style.display = 'none';
        } else {
            this.element.style.display = '';
        }
        return this;
    },
    size: function (height, width) {
        this.element.style.height = height + 'px';
        this.element.style.width = width + 'px';
        return this;
    },
    css: function (property, value, priority) {
        this.element.setAttribute("style", property + ":" + value + ";");
        return this;
    },
    // html: function (content = null) {
    //   if (content !== null) {
    //     this.selector.innerHTML = content;
    //   }
    //   return this.selector.innerHTML;
    // },

};


