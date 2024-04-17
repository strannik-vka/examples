<script>
    window.globalVar = {
        course: {
            id: <?= $course->id ?>
        },
        lesson: {
            id: <?= isset($lesson->id) ? $lesson->id : 'false' ?>,
            passed: <?= isset($lesson->id) ? ($lesson->isPassed() ? 'true' : 'false') : 'false' ?>
        },
        progressMap: <?= $progressMap ?>,
        isAnswer: <?= $answer ? 'true' : 'false' ?>
    }

    window.csrf_token = '<?= csrf_token() ?>'
</script>