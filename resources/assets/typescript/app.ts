/**
 * Created by kocal on 21/03/16.
 */

function init() {
    switch(location.pathname) {
        case '/video/add':
            return initVideoAdd()
        default:
    }
}

function initVideoAdd() {
    var videoPicker : HTMLInputElement = <HTMLInputElement>document.querySelector('form .video-picker');
    var videoTitle : HTMLInputElement = <HTMLInputElement>document.querySelector('form #title');
    var video: HTMLVideoElement = <HTMLVideoElement>document.querySelector('form video');

    videoPicker.addEventListener("change", (e:Event) => {
        onVideoPickerChange.call(videoPicker, e, videoTitle, video);
    }, false);
}

function onVideoPickerChange(e: Event, videoTitle: HTMLInputElement, video: HTMLVideoElement) {
    var file:File = this.files[0];

    videoTitle.value = file.name;
    video.src = URL.createObjectURL(file)
}

document.addEventListener('DOMContentLoaded', init, false)
