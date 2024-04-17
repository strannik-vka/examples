@isset($myHomeWork)
<!-- Комментарий к моей работе -->
<div class="valuation-form valuation-form-comment">
    <div class="row">
        <div class="col-12">
            <div class="valuation-form">
                <div class="row">
                    <div class="col-12">
                        <div class="valuation-form-label">
                            Комментарий:
                        </div>
                    </div>
                    <div class="col-12">
                        И нет сомнений, что интерактивные прототипы обнародованы. Современные технологии достигли такого уровня, что перспективное планирование обеспечивает широкому кругу (специалистов) участие в формировании экономической целесообразности принимаемых решений. Сложно сказать, почему ключевые особенности структуры проекта лишь добавляют фракционных разногласий и превращены в посмешище, хотя само их существование приносит несомненную пользу обществу.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <div class="form-icon form-icon-info form-icon-end form-icon-start">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="10" fill="#88FF0B" />
                        <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                    </svg>
                </div>
                <textarea rows="1" name="comment" type="text" class="form-control form-control-bottom" id="comment" placeholder="Ваш ответ" data-autosize="true" style="flex:1;resize:none;"></textarea>
                <label for="comment">Ваш ответ</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Ответить</button>
        </div>
    </div>
</div>
@else
<!-- Мой комментарий к другой работе -->
<div class="valuation-form valuation-form-comment">
    <div class="row">
        <div class="col-12">
            <div class="valuation-form">
                <div class="row">
                    <div class="col-12">
                        <div class="valuation-form-label">
                            Ваш комментарий:
                        </div>
                    </div>
                    <div class="col-12">
                        Принимая во внимание показатели успешности, укрепление и развитие внутренней структуры предоставляет широкие возможности для первоочередных требований. Но экономическая повестка сегодняшнего дня однозначно определяет каждого участника как способного принимать собственные решения касаемо первоочередных требований. Прежде всего, глубокий уровень погружения требует от нас анализа дальнейших направлений развития.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <div class="form-icon form-icon-info form-icon-end form-icon-start">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="10" fill="#88FF0B" />
                        <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                    </svg>
                </div>
                <textarea rows="1" name="comment" type="text" class="form-control form-control-bottom" id="comment" placeholder="Оставить комментарий" data-autosize="true" style="flex:1;resize:none;"></textarea>
                <label for="comment">Оставить комментарий</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
        </div>
    </div>
</div>
@endif