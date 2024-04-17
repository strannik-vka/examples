import '../../../../../js-modules/constructorPoll';
import '../../../../../js-modules/audio';
import '../../../../../js-modules/endlessPosts';

$(document)
    .on('afterLoadNextPost', () => {
        audio.setFullTime();
        audio.setWaveLoad();
    });