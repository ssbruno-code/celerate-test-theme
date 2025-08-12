/** Enforce variables for colors & font-sizes (allows CSS vars too) */
module.exports = {
  extends: ['stylelint-config-standard-scss'],
  rules: {
    // Only allow SCSS/CSS variables for color-ish props
    'declaration-property-value-allowed-list': {
      // colors
      '/^color$/': [/\$|var\(/, 'inherit', 'transparent', 'currentColor', 'initial', 'unset'],
      'background-color': [/\$|var\(/, 'inherit', 'transparent', 'currentColor', 'initial', 'unset'],
      'border-color': [/\$|var\(/, 'inherit', 'transparent', 'currentColor', 'initial', 'unset'],
      'outline-color': [/\$|var\(/, 'inherit', 'transparent', 'currentColor', 'initial', 'unset'],
      'fill': [/\$|var\(/, 'inherit', 'currentColor'],
      'stroke': [/\$|var\(/, 'inherit', 'currentColor'],
      // font-size
      'font-size': [/\$|var\(/, 'inherit', 'initial', 'unset']
    },
    // quality-of-life defaults
    'alpha-value-notation': 'number',
    'color-function-notation': 'modern'
  }
};