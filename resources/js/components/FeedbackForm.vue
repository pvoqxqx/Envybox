<template>
    <div id="feedback-form" class="feedback-form">
        <h1 class="feedback-form_title">Feedback Form</h1>
        <div class="separator"></div>

        <div v-if="isSending" class="loading">Sendig...</div>

        <form class="form" @submit="onSubmit">
            <input required name="name" v-model='feedback.name' placeholder="Name" type="text" autocomplete="off">
            <input required name="phone" v-model="feedback.phone" placeholder="Phone" type="text" autocomplete="off">
            <textarea name="message" v-model="feedback.message" rows="4" placeholder="Message" autocomplete="off"></textarea>
            <button class="button">Send</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "FeedbackForm",
    props: ['user'],
    data() {
        return {
            feedback: {
                name: '',
                phone: '',
                message: '',
            },

            isSending: false
        }
    },
    mounted() {
        if (this.user) {
            this.uploadUserInfo(this.user.name, this.user.phone);
        }
    },
    methods: {
        /*
         * Upload username and phone
        */
        uploadUserInfo(name, phone) {
            if (name) {
                this.feedback.name = name;
            }
            if (phone) {
                this.feedback.phone = phone;
            }
        },

        /**
         * Clear the form
         */
        clearForm() {
            for (let field in this.feedback) {
                this.feedback[field] = ''
            }
        },

        /**
         * Handler for submit
         */
        onSubmit(evt) {
            evt.preventDefault();

            this.isSending = true;

            // Build for data
            let form = new FormData();
            for (let field in this.feedback) {
                form.append(field, this.feedback[field]);
            }

            axios.post('/upload', form).then((response) => {
                this.isSending = false;
                this.clearForm();

                if (this.user) {
                    this.uploadUserInfo(this.user.name, this.user.phone);
                }

                alert('Ваше обращение успешно принято, ожидайте звонка.');
            }).catch((e) => {
                console.log(e)
            });
        }
    }
}
</script>

<style scoped>
/* Feedback form*/
.feedback-form {
    font-size: 16px;
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
}

.feedback-form .separator {
    border-bottom: solid 1px #ccc;
    margin-bottom: 15px;
}

.feedback-form .form {
    display: flex;
    flex-direction: column;
    font-size: 16px;
}

.feedback-form_title {
    color: #333;
    text-align: left;
    font-size: 28px;
}

.feedback-form input[type="text"],
.feedback-form textarea {
    border: solid 1px #e8e8e8;
    font-family: 'Nanito', sans-serif;
    padding: 10px 7px;
    margin-bottom: 15px;
    outline: none;
}

.feedback-form textarea {
    resize: none;
}

.feedback-form .button {
    background: #da552f;
    border: solid 1px #da552f;
    color: white;
    cursor: pointer;
    padding: 10px 50px;
    text-align: center;
    text-transform: uppercase;
}

.feedback-form .button:hover {
    background: #ea532a;
    border: solid 1px #ea532a;
}

.feedback-form input[type="text"],
.feedback-form textarea,
.feedback-form .button {
    font-size: 15px;
    border-radius: 3px
}

</style>
