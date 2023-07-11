import math

# Input parameters
crank_radius = 0.315  # m
connecting_rod_length = 0.98  # m
obliquity_ratio = 3.111
angular_velocity = 225 * 2 * math.pi / 60  # rad/s
angle_list = [0, 30, 60, 90, 120, 150, 180, 210, 240, 270, 300, 330, 360]

# Looping over each angle
for angle in angle_list:
    # Conversion to radians
    angle = math.radians(angle)

    # Calculating position and velocity of slider
    crank_angle = math.atan2(math.sin(angle), math.cos(angle) - obliquity_ratio)
    slider_position = crank_radius * math.cos(crank_angle) + math.sqrt(
        connecting_rod_length * 2 - crank_radius * 2 * math.sin(crank_angle) ** 2)
    slider_velocity = -crank_radius * math.sin(crank_angle) * angular_velocity / math.sqrt(
        connecting_rod_length * 2 - crank_radius * 2 * math.sin(crank_angle) ** 2)
    slider_acceleration = -(crank_radius * angular_velocity * 2 * math.sin(crank_angle) + crank_radius * math.cos(
        crank_angle) * angular_velocity * math.sin(crank_angle) ** 2) / (
                                      connecting_rod_length - crank_radius * 2 * math.sin(crank_angle) ** 2) ** (3 / 2)

    # Calculating position and velocity of connecting rod
    connecting_rod_position = math.sqrt(
        connecting_rod_length * 2 - crank_radius * 2 * math.sin(crank_angle) ** 2) - crank_radius * math.cos(
        crank_angle)
    connecting_rod_velocity = (crank_radius * angular_velocity * math.sin(crank_angle)) / math.sqrt(
        connecting_rod_length * 2 - crank_radius * 2 * math.sin(crank_angle) ** 2)
    connecting_rod_acceleration = (angular_velocity * 2 * math.sin(crank_angle) * math.cos(crank_angle) * (
                connecting_rod_length - crank_radius * math.sin(
            crank_angle) ** 2) - crank_radius * angular_velocity * math.sin(crank_angle) ** 3) / (
                                              connecting_rod_length - crank_radius * 2 * math.sin(
                                          crank_angle) ** 2) ** (3 / 2)

    # Displaying results
    print(f"Angle {math.degrees(angle)} degrees:")
    print("Piston position:", slider_position, "m")
    print("Piston velocity:", slider_velocity, "m/s")
    print("Piston acceleration:", slider_acceleration, "m/s^2")
    print("Connecting rod position:", connecting_rod_position, "m")
    print("Connecting rod velocity:", connecting_rod_velocity, "m/s")
    print("Connecting rod acceleration:", connecting_rod_acceleration, "m/s^2")
    print("")
