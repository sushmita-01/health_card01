const mongoose = require('mongoose');

const healthCardSchema = new mongoose.Schema({
  name: String,
  dob: String,
  bloodGroup: String,
  gender: String,
  allergies: String,
  conditions: String,
  emergencyName: String,
  emergencyPhone: String,
  emergencyRelation: String
});

module.exports = mongoose.model('HealthCard', healthCardSchema);
