module.exports = {
  content: ["./**/*.php", "./**/*.css"],
  theme: {
    extend: {
      cursor: {
        close:
          "url(/Users/samkobe/Local Sites/got-funded/app/public/wp-content/themes/gotfunded/src/assets/view-project-bright.svg), pointer",
      },
      colors: {
        brand: {
          main: "#FFFFFF",
          alt: "#C2DDF0",
          third: "#3C92CA",
          third_dark: "#0D2E44",
          fourth: "#ffa300",
          fourth_dark: "#dd8800",
          black: "#031927",
          light_gradient: "#3078A7",
          dark_gradient: "#0D2E44",
          light_grey: "#FAFAFA",
          dark_grey: "#EDEDED",
          darkest_grey: "#888888",
        },
      },
      boxShadow: {
        custom: "0 4px 6px -4px rgb(0 0 0 / 0.3)",
      },
      flexShrink: {
        4: 4,
      },
      fontFamily: {
        sans: ["Open Sans", "sans-serif"],
        title: ["Roboto", "san-serif"],
        button: ["Roboto Mono", "san-serif"],
      },
      minWidth: {
        "1/2": "50%",
        "1/3": "33.3334%",
      },
      minHeight: {
        0: "0",
        "1/4": "25%",
        "1/2": "50%",
        "3/4": "75%",
        full: "100%",
      },
      spacing: {
        "1/2": "50%",
        "1/3": "33.3334%",
        "1/4": "25%",
        "1/6": "16.6667%",
        "1/8": "12.5%",
        "7/8": "87.5%",
        "1/12": "8.3333%",
        "1/24": "4.1667%",
        "13/24": "54.1667%",
        video: "56.6667%",
      },
      transitionDuration: {
        0: "0ms",
      },
      transitionDelay: {
        0: "0ms",
      },
      transitionProperty: {
        height: "height",
        "transform-height": "transform, height",
      },
      width: {
        "3/8": "37.5%",
        "5/8": "62.5%",
      },
      zIndex: {
        1: "1",
      },
    },
  },
  plugins: [],
};
