/**
 * Created by kocal on 21/03/16.
 */
function init() {
    switch (location.pathname) {
        case '/video/add':
            return initVideoAdd();
        default:
    }
}
function initVideoAdd() {
    var $videoTitle = document.querySelector('form #title');
    var $videoPicker = document.querySelector('form .video-picker');
    var $video = document.querySelector('form video');

    $videoPicker.addEventListener('change', function (e) {
        onVideoPickerChange.call($videoPicker, e, $videoTitle, $video);
    }, false);
}

function onVideoPickerChange(e, videoTitle, $video) {
    var file = this.files[0];

    if(!file) {
        return;
    }

    $video.src = URL.createObjectURL(file);

    if (videoTitle.value.length == 0)
        videoTitle.value = file.name;
}

document.addEventListener('DOMContentLoaded', init, false);

//# sourceMappingURL=app.js.map
