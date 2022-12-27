Vue.createApp({
  data() {
    return {
      menuOpen: false,
      videoOpen: false,
      annualSelection: false,
      view: {
        atTopOfPage: true,
      },
    };
  },
  // a beforeMount call to add a listener to the window
  beforeMount() {
    window.addEventListener("scroll", this.handleScroll);
  },
  methods: {
    toggle() {
      this.menuOpen = !this.menuOpen;
    },
    toggleVideo() {
      this.videoOpen = !this.videoOpen;
    },
    toggleMonthly() {
      this.annualSelection = false;
    },
    toggleAnnual() {
      this.annualSelection = true;
    },
    goto(refName) {
      var element = this.$refs[refName];
      var top = element.offsetTop;

      window.scrollTo({
        left: 0,
        top: top - 96,
        behavior: "smooth",
      });
    },
    // the function to call when the user scrolls, added as a method
    handleScroll() {
      // when the user scrolls, check the pageYOffset
      if (window.pageYOffset > 0) {
        // user is scrolled
        if (this.view.atTopOfPage) this.view.atTopOfPage = false;
      } else {
        // user is at top of page
        if (!this.view.atTopOfPage) this.view.atTopOfPage = true;
      }
    },
  },
}).mount("#app");