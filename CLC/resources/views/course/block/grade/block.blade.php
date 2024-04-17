<!-- Блок с оценкой ДЗ -->
<div class="grade-block">
    <div class="grade-block-inner">
        <!-- Навигация в блоке оценки ДЗ -->
        <div class="grade-block-nav">
            <div class="row">
                <div class="col">
                    <button role="tab" class="grade-block-nav-link active" data-tab-toggle="myHomeWork">
                        Оценки моего д/з
                    </button>
                </div>
                <div class="col">
                    <button role="tab" class="grade-block-nav-link" data-tab-toggle="studentHomeWork">
                        Оценки д/з учеников
                    </button>
                </div>
            </div>
        </div>
        <!-- Вкладки в блоке оценки ДЗ -->
        <div class="grade-block-content">
            <div class="tab-content" role="data-tabs">
                <!-- Вкладка с оценкой моего ДЗ -->
                <div class="tab-pane active" data-tab-id="myHomeWork">
                    <div class="grade-block-tab">
                        @include('course.block.grade.homework.my', ['rated' => true])
                    </div>
                </div>
                <!-- Вкладка с оценкой ДЗ учеников -->
                <div class="tab-pane" data-tab-id="studentHomeWork">
                    <div class="grade-block-tab">
                        @include('course.block.grade.homework.student')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>