import {reactive} from "vue";
import Swal from "sweetalert2";
import {router} from "@inertiajs/vue3";
import axios from "axios";
import NProgress from 'nprogress'

export const store = reactive({

    message: null,
    messageType: null,
    loading: false,

    controller: route().current().split('.')[0],

    action: route().current().split('.').pop(),

    setMessage(message, type) {

        return;

        this.message = message;
        this.messageType = type;

        setTimeout(() => {
            this.message = null;
            this.messageType = null;
        }, 1000)
    },

    setController() {
        this.controller = route().current().split('.')[0];
    },

    setAction() {
        this.action = route().current().split('.').pop();
    },

    store(form) {
        axios.post(route('api.' + this.controller + '.store'), form)
            .then(response => {

                form.reset()

                Swal.fire({
                    position: "center",
                    title: response.data.message,
                    icon: "success",
                    showConfirmButton: true,
                    confirmButtonText: "Edit",
                    showCancelButton: true,
                })
                    .then(result => {
                        if (result.isConfirmed) {
                            router.visit(route(this.controller + '.edit', response.data.data))
                        } else if (result.isDismissed) {
                            router.visit(route(this.controller + '.index'))
                        }
                    })
            })
            .catch(error => {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    title: error.response.data.message,
                    icon: "error",
                    showConfirmButton: false,
                    showCloseButton: true
                })
            })
    },

    update(form) {

        this.loading = true;
        NProgress.start()

        axios.put(route('api.' + this.controller + '.update', form), form)
            .then(response => {

                this.setMessage(response.data.message, 'success')

            })
            .catch(error => {

                NProgress.remove()
                this.setMessage(error.response.data.message, 'error')

            })
            .finally(() => {
                NProgress.done();
                this.loading = false;
            })
    },

    destroy(form) {
        Swal.fire({
            position: "center",
            title: "Are you sure?",
            showCancelButton: true,
            showConfirmButton: true,
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete(route('api.' + this.controller + '.destroy', form), form)
                        .then(response => {
                            Swal.fire({
                                position: "center",
                                title: response.data.message,
                                icon: "success",
                                showCancelButton: true,
                                showConfirmButton: true,
                                timer: 5000,
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                            })
                                .then(result => {
                                    if (result.isDismissed) {
                                        this.restore(form)
                                    }
                                })
                                .finally(() => {
                                    router.visit(route(this.controller + '.index'))
                                })
                        })
                        .catch(error => {
                            Swal.fire({
                                toast: true,
                                position: "top-end",
                                title: error.response.data.message,
                                icon: "error",
                                showConfirmButton: false,
                                showCloseButton: true
                            })
                        })
                }
            })
    },

    restore(id) {
        axios.post(route('api.' + this.controller + '.restore', id))
            .then(response => {
            })
            .catch(error => {
            })
    },

    available(id) {
        axios.post(route('api.' + this.controller + '.available', id))
            .then(response => {
            })
            .catch(error => {
            })
    },
})
