window.onload = function exampleFunction() {
    document.querySelectorAll(".time").innerHTML = "00:00";
}
var currentSkin = getCurrentSkin();
var stories = new Zuck('stories', {
  backNative: true,
  previousTap: true,
  skin: currentSkin['name'],
  autoFullScreen: currentSkin['params']['autoFullScreen'],
  avatars: currentSkin['params']['avatars'],
  paginationArrows: currentSkin['params']['paginationArrows'],
  list: currentSkin['params']['list'],
  cubeEffect: currentSkin['params']['cubeEffect'],
  localStorage: true,
  timeZone:true,
  stories: [
    Zuck.buildTimelineItem(
      "bni",
      "assets/images/user/1.jpg",
      "Your Story",
      "",
      timestamp(),
      [
        ["bni-1", "video", 0, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/4.mp4", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/4.jpg", '', false, false, timestamp()],
        ["bni-2", "photo", 3, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/5.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/5.jpg", '', false, false, timestamp()],
        ["bni-3", "photo", 3, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/3.png", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/3.png", 'https://ramon.codes/', 'Visit my Portfolio', false, timestamp()]
      ]
    ),
    Zuck.buildTimelineItem(
      "bob",
      "assets/images/user/13.jpg",
      "Bob Frapples",
      "",
      timestamp(),
      [
        ["bob-1", "photo", 3, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/1.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/1.jpg", '', false, false, timestamp()],
        ["bob-12", "video", 0, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/2.mp4", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/2.jpg", '', false, false, timestamp()],
      ]
    ),
    Zuck.buildTimelineItem(
      "greta",
      "assets/images/user/14.jpg",
      "Greta Life",
      "",
      timestamp(),
      [
        ["greta-1", "photo", 5, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/6.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/6.jpg", '', false, false, timestamp()],
        ["greta-2", "photo", 3, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/7.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/7.jpg", 'http://ladygaga.com/', false, false, timestamp()],
      ]
    ),
    Zuck.buildTimelineItem(
      "pete",
      "assets/images/user/15.jpg",
      "Pete Sariya",
      "",
      timestamp(),
      [
        ["pete-1", "photo", 5, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/8.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/8.jpg", '', false, false, timestamp()]
      ]
    ),
    Zuck.buildTimelineItem(
      "paige",
      "assets/images/user/16.jpg",
      "Paige Turner",
      "",
      timestamp(),
      [
        ["paige", "photo", 10, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", '', false, false, timestamp()]
      ]
    ),
    Zuck.buildTimelineItem(
        "marcum",
        "assets/images/user/17.jpg",
        "Marcum Shaw",
        "",
        timestamp(),
        [
          ["marcum-1", "photo", 10, "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", "../../../raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", '', false, false, timestamp()]
        ]
      )
  ]
});