"use strict";

const chatTabs = document.querySelectorAll('#sidebar-menu [data-bs-toggle="tab"]')
_.forEach(chatTabs, function(elem) {
    const instance = bootstrap.Tab.getOrCreateInstance(elem)
    elem.addEventListener('shown.bs.tab', function(e) {
        chatTabs.forEach(function(elem) {
            elem.closest('li').classList.remove('active')
        })
        e.target.closest('li').classList.add('active')
    })
})