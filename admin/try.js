export default {
    data() {
      return {
        date: null,
      };
    },
    computed: {
      errorMessage() {
        if (!this.date) return 'Date is required.';
        return '';
      },
    },
  };