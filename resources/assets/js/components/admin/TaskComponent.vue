<template>
    <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Task List</h4>
            <p class="card-category"> Tasks for Christmas shopping</p>

            <div class="card-tools">
                            <button
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#addNew"
                                @click="openModalWindow"
                            >
                                Add New <i class="material-icons">assignment</i>
                            </button>
                        </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Code
                  </th>
                  <th>
                    Status
                  </th>
                </thead>
                <tbody>
                  <tr v-for="task in tasks" :key="task.id">
                                    <td>{{ task.id }}</td>
                                    <td>{{ task.name }}</td>
                                    <td>{{ task.description }}</td>
                                    <td>{{ task.code }}</td>
                                    <td>{{ task.status }}</td>

                                    <td>
                                        <a
                                            href="#"
                                            data-id="task.id"
                                            @click="editModalWindow(task)"
                                        >
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                        |
                                        <a
                                            href="#"
                                            @click="deleteUser(task.id)"
                                        >
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
       
    </div>

        <!-- 
        <div class="row mt-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Task List</h3>

                        <div class="card-tools">
                            <button
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#addNew"
                                @click="openModalWindow"
                            >
                                Add New <i class="material-icons">assignment</i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                </tr>

                                <tr v-for="task in tasks" :key="task.id">
                                    <td>{{ task.id }}</td>
                                    <td>{{ task.name }}</td>
                                    <td>{{ task.description }}</td>
                                    <td>{{ task.code }}</td>
                                    <td>{{ task.status }}</td>

                                    <td>
                                        <a
                                            href="#"
                                            data-id="task.id"
                                            @click="editModalWindow(task)"
                                        >
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                        |
                                        <a
                                            href="#"
                                            @click="deleteUser(task.id)"
                                        >
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        -->


        <div
            class="modal fade"
            id="addNew"
            tabindex="-1"
            role="dialog"
            aria-labelledby="addNewLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            v-show="!editMode"
                            class="modal-title"
                            id="addNewLabel"
                        >
                            Add New Task
                        </h5>
                        <h5
                            v-show="editMode"
                            class="modal-title"
                            id="addNewLabel"
                        >
                            Update Task
                        </h5>

                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form
                        @submit.prevent="editMode ? updateUser() : createUser()"
                    >
                        <div class="modal-body">
                            <div class="form-group">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    placeholder="Name"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <input
                                    v-model="form.description"
                                    type="text"
                                    name="description"
                                    placeholder="Description"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('description')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="description"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <input
                                    v-model="form.code"
                                    type="text"
                                    name="code"
                                    id="code"
                                    placeholder="Enter a Code"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'code'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="code"
                                ></has-error>
                            </div>

                            <div class="form-group">
                                <select
                                    name="status"
                                    v-model="form.status"
                                    id="status"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('status')
                                    }"
                                >
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="status"
                                ></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                v-show="editMode"
                                type="submit"
                                class="btn btn-primary"
                            >
                                Update
                            </button>
                            <button
                                v-show="!editMode"
                                type="submit"
                                class="btn btn-primary"
                            >
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editMode: false,
            tasks: {},
            form: new Form({
                id: "",
                name: "",
                description: "",
                code: "",
                status: ""
            })
        };
    },
    methods: {
        editModalWindow(task) {
            this.form.clear();
            this.editMode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(task);
        },
        updateUser() {
            this.form
                .put("api/task/" + this.form.id)
                .then(() => {
                    Toast.fire({
                        icon: "success",
                        title: "User updated successfully"
                    });

                    Fire.$emit("AfterCreatedTaskLoadIt");

                    $("#addNew").modal("hide");
                })
                .catch(() => {
                    console.log("Error.....");
                });
        },
        openModalWindow() {
            this.editMode = false;
            this.form.reset();
            $("#addNew").modal("show");
        },

        loadUsers() {
            axios.get("api/task").then(data => (this.tasks = data.data));

            //pick data from controller and push it into users object
        },

        createUser() {
            this.$Progress.start();

            this.form
                .post("api/task")
                .then(() => {
                    Fire.$emit("AfterCreatedTaskLoadIt"); //custom events

                    Toast.fire({
                        icon: "success",
                        title: "User created successfully"
                    });

                    this.$Progress.finish();

                    $("#addNew").modal("hide");
                })
                .catch(() => {
                    console.log("Error......");
                });

            //this.loadUsers();
        },
        deleteUser(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    //Send Request to server
                    this.form
                        .delete("api/task/" + id)
                        .then(response => {
                            Swal.fire(
                                "Deleted!",
                                "User deleted successfully",
                                "success"
                            );
                            this.loadUsers();
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                                footer: "<a href>Why do I have this issue?</a>"
                            });
                        });
                }
            });
        }
    },

    created() {
        this.loadUsers();

        Fire.$on("AfterCreatedTaskLoadIt", () => {
            //custom events fire on
            this.loadUsers();
        });
    }
};
</script>
