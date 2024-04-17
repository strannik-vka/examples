import '../../../../../js-modules/jquery.countdown';
import CountTitles from '../../../../../js-modules/CountTitles';

var datetime = $('[data-countdown]').attr('data-countdown');

if (datetime) {
    $('[data-countdown]').countdown(datetime, function (event) {
        $(this).find('[data-days]').html(event.offset.totalDays);
        $(this).find('[data-days-text]').html(CountTitles(event.offset.totalDays, ['День', 'Дня', 'Дней']));
        $(this).find('[data-hours]').html(event.offset.hours);
        $(this).find('[data-hours-text]').html(CountTitles(event.offset.hours, ['Час', 'Часа', 'Часов']));
        $(this).find('[data-minutes]').html(event.offset.minutes);
        $(this).find('[data-minutes-text]').html(CountTitles(event.offset.minutes, ['Минута', 'Минуты', 'Минут']));
        $(this).find('[data-seconds]').html(event.offset.seconds);
        $(this).find('[data-seconds-text]').html(CountTitles(event.offset.seconds, ['Секунда', 'Секунды', 'Секунд']));
    });
}