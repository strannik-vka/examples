<!-- Отправить заявку на наставничество -->
<div class="modal modal-request" data-modal-id="requestMentor">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-header">
                <h6 data-title class="modal-title">
                    Оставить заявку на наставничество
                </h6>
            </div>
            <div class="modal-body">
                <form data-ajax-form action="{{ Route('form.mentor.store') }}" id="requestMentorForm" class="row g-5">
                    @csrf
                    <div class="col-12">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input value="" name="name" type="text" class="form-control form-control-bottom" id="mentorFirstName" placeholder="Имя" required>
                                    <label for="firstName">Имя</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input value="" name="lastname" type="text" class="form-control form-control-bottom" id="mentorLastName" placeholder="Фамилия" required>
                                    <label for="lastName">Фамилия</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input value="" name="phone" type="text" class="form-control form-control-bottom" id="mentorPhone" placeholder="Телефон" required>
                                    <label for="phone">Телефон</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input value="" name="email" type="email" class="form-control form-control-bottom" id="mentorLastEmail" placeholder="E-Mail" required>
                                    <label for="email">E-Mail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row g-3 justify-content-center">
                            <div class="col-12 col-md-auto">
                                <button type="submit" class="btn btn-primary btn-wider w-100">
                                    Отправить
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="text-7 text-center">
                                    <span class="opacity-50">Нажимая «Отправить», вы разрешаете нам</span> <br>
                                    <a href="{{ Route('agreement.data') }}" target="_blank" class="text-link">обрабатывать ваши персональные данные</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>