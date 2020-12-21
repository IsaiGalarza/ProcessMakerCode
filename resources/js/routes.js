import Task from "./components/admin/TaskComponent.vue";

export const routes = [
    {
        path: "/taskvue",
        name: "taskvue",
        component: Task
    },
    {
        path: "/task",
        component: Task
    }
];
