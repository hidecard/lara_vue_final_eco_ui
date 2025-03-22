<script setup>
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
const form = useForm({
    permissionSign: '',
    password: '',
})


const deleteAcc = () => {
    if (form.permissionSign.toLowerCase() == "@sure") {
        form.post(route('profile.delete'), {
            onSuccess: () => {
                toast.success("Account Deleted");
                toast.success("Thanks for being with us!");
            },
            onError: () => {
                toast.error(form.errors.message);
            },
        });
    }
    else {
        toast.error("You must confirm your account deletion");
        document.getElementsByClassName('btn-close')[0].click();

    }
}
</script>

<template>
    <!-- Modal -->
    <div class="modal fade" id="deleteConfirmation" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold text-danger" id="userModalLabel">Are you sure you want to
                        delete?</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="deleteAcc">
                        <div class="mb-3">
                            <label for="text" class="form-label">Confirm with "@sure"</label>
                            <input type="text" class="form-control" id="" placeholder="Type @sure"
                                v-model="form.permissionSign" required>
                        </div>

                        <div class="mb-5">
                            <!-- input -->
                            <label for="password" class="form-label">Password</label>

                            <input type="password" class="form-control" id="password" placeholder="Password"
                                v-model="form.password" required>
                        </div>
                        <div class="col-12 d-grid"> <button type="submit" data-bs-dismiss="modal"
                                class="btn btn-danger">Confirm Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>