
async function getLocations (lat, lon, distance, limit) {
  try {
    const response = await jQuery.get(wc_ajax_obj.ajaxUrl, {
      _ajax_nonce: wc_ajax_obj.nonce,
      action: wc_ajax_obj.action,
      lat: lat,
      lon: lon,
      distance: distance || 50,
      limit: limit || 50
    })

    const data = JSON.parse(response)
    return data
  } catch (error) {
    return [] // Fail silently
  }
}

export default {
  getLocations
}
